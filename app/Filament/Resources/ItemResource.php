<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Category;
use App\Models\Item;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->options(function () {
                                $categories = Category::where('is_active', true)
                                    ->with('parent')
                                    ->orderBy('name')
                                    ->get();

                                $options = [];
                                foreach ($categories as $category) {
                                    if ($category->parent_id) {
                                        // Sub-category: show as "Parent > Sub-category"
                                        $options[$category->id] = $category->parent->name . ' > ' . $category->name;
                                    } else {
                                        // Parent category
                                        $options[$category->id] = $category->name;
                                    }
                                }
                                return $options;
                            })
                            ->helperText('Select a category or sub-category for this item.'),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function ($state, Set $set) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true)
                            ->dehydrated()
                            ->helperText('Auto-generated from title. You can edit it if needed.'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('short_description')
                            ->label('Short Description')
                            ->helperText('Brief description for modal display')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Metadata')
                    ->schema([
                        Forms\Components\TextInput::make('author')
                            ->label('Author / Publisher')
                            ->maxLength(255)
                            ->helperText('Author or publisher name (e.g., Mary Matherson, World Bank)'),
                    ]),

                Forms\Components\Section::make('Media')
                    ->schema([
                        CuratorPicker::make('featured_image_id')
                            ->label('Featured Image')
                            ->relationship('featuredImage', 'id')
                            ->buttonLabel('Select Media')
                            ->listDisplay(true)
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Additional Resources')
                    ->schema([
                        Forms\Components\Repeater::make('additional_resources')
                            ->label('Resources')
                            ->schema([
                                CuratorPicker::make('media_id')
                                    ->label('Media')
                                    ->buttonLabel('Select Media')
                                    ->listDisplay(true)
                                    ->required()
                                    ->multiple(false),
                                Forms\Components\TextInput::make('filename')
                                    ->label('Filename')
                                    ->maxLength(255)
                                    ->required()
                                    ->helperText('Download name for the file (File will be downloaded with this name)'),
                                Forms\Components\TextInput::make('download_text')
                                    ->label('Download Text')
                                    ->maxLength(255)
                                    ->helperText('Text displayed beside the icon (defaults to filename, or "View summary file" if empty)'),
                                Forms\Components\TextInput::make('icon')
                                    ->label('Icon')
                                    ->maxLength(255)
                                    ->helperText('Icon class or name (e.g., material-symbols-outlined, heroicon-o-document)'),
                            ])
                            ->defaultItems(0)
                            ->addActionLabel('Add Resource')
                            ->reorderable()
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['download_text'] ?? $state['filename'] ?? 'New Resource')
                            ->columnSpanFull(),
                    ]),

                Forms\Components\Section::make('Case Study')
                    ->schema([
                        Forms\Components\Toggle::make('is_case_study')
                            ->label('Is Case Study')
                            ->default(false)
                            ->required()
                            ->live()
                            ->helperText('Enable if this is a case study'),
                    ]),

                Forms\Components\Section::make('Location')
                    ->schema([
                        Forms\Components\TextInput::make('latitude')
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('longitude')
                            ->numeric()
                            ->default(null),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\TextInput::make('country')
                            ->label('Country')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\Select::make('project_phase')
                            ->label('Project Phase')
                            ->options([
                                'construction' => 'Construction',
                                'completed' => 'Completed',
                                'planning' => 'Planning',
                                'proposal' => 'Proposal',
                            ])
                            ->nullable()
                            ->searchable(),
                    ])
                    ->columns(2)
                    ->visible(fn (Forms\Get $get) => $get('is_case_study')),

                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                $query->with(['category.parent']);
            })
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->formatStateUsing(function ($record) {
                        if ($record->category && $record->category->parent) {
                            return $record->category->parent->name . ' > ' . $record->category->name;
                        }
                        return $record->category->name ?? 'N/A';
                    })
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->searchable(),

                Tables\Columns\TextColumn::make('author')
                    ->label('Author / Publisher')
                    ->formatStateUsing(fn ($record) => $record->author ?? $record->publisher ?? 'N/A')
                    ->searchable(),

                Tables\Columns\IconColumn::make('is_case_study')
                    ->label('Case Study')
                    ->boolean()
                    ->toggleable(),

                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),

                Tables\Columns\TextColumn::make('latitude')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('longitude')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('address')
                    ->searchable(),

                CuratorColumn::make('featured_image_id')
                    ->label('Media'),

                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
