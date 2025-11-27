<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SliderCardResource\Pages;
use App\Filament\Resources\SliderCardResource\RelationManagers;
use App\Models\SliderCard;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SliderCardResource extends Resource
{
    protected static ?string $model = SliderCard::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Card Information')
                    ->schema([
                        Forms\Components\Textarea::make('title')
                            ->label('Title')
                            ->required()
                            ->rows(3)
                            ->helperText('Main title text (can be multiple lines)')
                            ->columnSpanFull(),
                        
                        Forms\Components\TextInput::make('icon')
                            ->label('Icon')
                            ->helperText('Material Symbols icon name (e.g., chat, settings, info). Leave empty to hide icon section.')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('subtitle_line_1')
                            ->label('Subtitle Line 1')
                            ->helperText('First line of subtitle text')
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('subtitle_line_2')
                            ->label('Subtitle Line 2')
                            ->helperText('Second line of subtitle text')
                            ->maxLength(255),
                    ]),
                
                Forms\Components\Section::make('Expandable Content')
                    ->schema([
                        Forms\Components\Toggle::make('has_expandable')
                            ->label('Has Expandable Content')
                            ->default(false)
                            ->required()
                            ->live()
                            ->helperText('Enable if this card should have expandable content section'),
                        
                        Forms\Components\TextInput::make('expandable_title')
                            ->label('Expandable Section Title')
                            ->visible(fn (Forms\Get $get) => $get('has_expandable'))
                            ->maxLength(255),
                        
                        Forms\Components\Repeater::make('expandable_items')
                            ->label('Expandable Items')
                            ->schema([
                                Forms\Components\TextInput::make('item')
                                    ->label('Bullet Point')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->visible(fn (Forms\Get $get) => $get('has_expandable'))
                            ->defaultItems(1)
                            ->collapsible()
                            ->itemLabel(fn (array $state): ?string => $state['item'] ?? null)
                            ->columnSpanFull(),
                    ]),
                
                Forms\Components\Section::make('Settings')
                    ->schema([
                        Forms\Components\Toggle::make('is_active')
                            ->label('Is Active')
                            ->default(true)
                            ->required()
                            ->helperText('Show or hide this card in the slider'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->limit(50)
                    ->wrap(),
                Tables\Columns\TextColumn::make('icon')
                    ->label('Icon')
                    ->searchable()
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('subtitle_line_1')
                    ->label('Subtitle')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\IconColumn::make('has_expandable')
                    ->label('Expandable')
                    ->boolean()
                    ->toggleable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Active')
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
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->placeholder('All Cards')
                    ->trueLabel('Active Cards')
                    ->falseLabel('Inactive Cards'),
                Tables\Filters\TernaryFilter::make('has_expandable')
                    ->label('Expandable')
                    ->placeholder('All Cards')
                    ->trueLabel('With Expandable Content')
                    ->falseLabel('Without Expandable Content'),
            ])
            ->reorderable('sort_order')
            ->defaultSort('sort_order')
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSliderCards::route('/'),
            'create' => Pages\CreateSliderCard::route('/create'),
            'edit' => Pages\EditSliderCard::route('/{record}/edit'),
        ];
    }
}
