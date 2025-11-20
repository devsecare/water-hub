<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Filament\Resources\CategoryResource\RelationManagers;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('name')
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
                            ->helperText('Auto-generated from name. You can edit it if needed.'),
                        Forms\Components\Select::make('parent_id')
                            ->label('Parent Category')
                            ->searchable()
                            ->preload()
                            ->helperText('Select a parent category to make this a sub-category. Leave empty for a top-level category.')
                            ->options(function ($record) {
                                // Only show top-level categories (no parent) as parent options
                                // Exclude the current category to prevent self-reference
                                $query = Category::where('is_active', true)
                                    ->whereNull('parent_id');

                                if ($record) {
                                    $query->where('id', '!=', $record->id);
                                }

                                return $query->pluck('name', 'id');
                            }),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Appearance')
                    ->schema([
                        Forms\Components\ColorPicker::make('color')
                            ->label('Category Color')
                            ->required()
                            ->default('#3B82F6')
                            ->helperText('This color will be used as the gradient background for category items on the resources page.'),
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon')
                            ->maxLength(255)
                            ->default('folder')
                            ->helperText('Enter a Material Symbols icon name (e.g., view_agenda, folder, search). See Material Symbols guide for available icons.'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Description')
                    ->schema([
                        Forms\Components\Textarea::make('description')
                            ->rows(4)
                            ->columnSpanFull(),
                    ]),

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
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Parent Category')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ColorColumn::make('color')
                    ->label('Color'),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->badge()
                    ->searchable(),
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
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
