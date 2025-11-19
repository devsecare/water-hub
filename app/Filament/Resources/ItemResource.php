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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
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
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('publisher')
                    ->label('Publisher')
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->label('Resource Type')
                    ->options([
                        'guide' => 'Guide',
                        'video' => 'Video',
                        'podcast' => 'Podcast',
                        'case_study' => 'Case Study',
                    ])
                    ->default('guide')
                    ->required(),
                Forms\Components\Textarea::make('short_description')
                    ->label('Short Description')
                    ->helperText('Brief description for modal display')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('latitude')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('longitude')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('address')
                    ->maxLength(255)
                    ->default(null),
                CuratorPicker::make('featured_image_id')
                    ->label('Featured Image')
                    ->relationship('featuredImage', 'id')
                    ->buttonLabel('Select Featured Image')
                    ->listDisplay(true),
                Forms\Components\Toggle::make('is_active')
                    ->required(),
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
                Tables\Columns\TextColumn::make('publisher')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'guide' => 'Guide',
                        'video' => 'Video',
                        'podcast' => 'Podcast',
                        'case_study' => 'Case Study',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match($state) {
                        'guide' => 'success',
                        'video' => 'info',
                        'podcast' => 'warning',
                        'case_study' => 'danger',
                        default => 'gray',
                    }),
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
                    ->label('Featured Image'),
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
