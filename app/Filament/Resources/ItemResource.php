<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Items';

    protected static ?int $navigationSort = 2;

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
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (Forms\Set $set, $state) {
                                $set('slug', \Illuminate\Support\Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->maxLength(255)
                            ->unique(ignoreRecord: true),
                        Forms\Components\Select::make('type')
                            ->options([
                                'guide' => 'Guide',
                                'video' => 'Video',
                                'podcast' => 'Podcast',
                                'case_study' => 'Case Study',
                            ])
                            ->default('guide')
                            ->required()
                            ->native(false),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Content')
                    ->schema([
                        Forms\Components\Textarea::make('short_description')
                            ->label('Short Description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Brief summary of the item (max 500 characters)'),
                        Forms\Components\Textarea::make('description')
                            ->rows(5)
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Publisher & Media')
                    ->schema([
                        Forms\Components\TextInput::make('publisher')
                            ->maxLength(255)
                            ->helperText('Name of the publisher or author'),
                        CuratorPicker::make('featured_image_id')
                            ->label('Featured Image')
                            ->relationship('featuredImage', 'id'),
                    ])
                    ->columns(2),
                
                Forms\Components\Section::make('Location (Optional)')
                    ->schema([
                        Forms\Components\TextInput::make('latitude')
                            ->numeric()
                            ->default(null)
                            ->helperText('Latitude coordinate'),
                        Forms\Components\TextInput::make('longitude')
                            ->numeric()
                            ->default(null)
                            ->helperText('Longitude coordinate'),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255)
                            ->default(null)
                            ->columnSpanFull(),
                    ])
                    ->columns(2)
                    ->collapsible(),
                
                Forms\Components\Section::make('Status')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Inactive items will be hidden from public view'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featuredImage.path')
                    ->label('Image')
                    ->circular()
                    ->defaultImageUrl(url('/images/placeholder.png'))
                    ->toggleable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->limit(40),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->formatStateUsing(fn ($state) => match($state) {
                        'guide' => 'Guide',
                        'video' => 'Video',
                        'podcast' => 'Podcast',
                        'case_study' => 'Case Study',
                        default => 'Guide',
                    })
                    ->color(fn ($state) => match($state) {
                        'guide' => 'success',
                        'video' => 'warning',
                        'podcast' => 'info',
                        'case_study' => 'danger',
                        default => 'gray',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('publisher')
                    ->searchable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->label('Short Description')
                    ->limit(50)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('files_count')
                    ->label('Files')
                    ->counts('files')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('bookmarkedByUsers_count')
                    ->label('Bookmarks')
                    ->counts('bookmarkedByUsers')
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->sortable(),
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
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Category')
                    ->relationship('category', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\SelectFilter::make('type')
                    ->options([
                        'guide' => 'Guide',
                        'video' => 'Video',
                        'podcast' => 'Podcast',
                        'case_study' => 'Case Study',
                    ])
                    ->multiple(),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->placeholder('All')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
                Tables\Filters\Filter::make('has_files')
                    ->label('Has Files')
                    ->query(fn (Builder $query): Builder => $query->has('files')),
                Tables\Filters\Filter::make('has_bookmarks')
                    ->label('Has Bookmarks')
                    ->query(fn (Builder $query): Builder => $query->has('bookmarkedByUsers')),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
    
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withCount(['files', 'bookmarkedByUsers']);
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
