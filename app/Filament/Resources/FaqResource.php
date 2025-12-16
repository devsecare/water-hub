<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Content';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('FAQ Information')
                    ->schema([
                        Forms\Components\TextInput::make('question')
                            ->required()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\RichEditor::make('answer')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('category')
                            ->label('Category')
                            ->required()
                            ->options([
                                'about_the_hub' => 'About the Hub',
                                'about_water_ppps' => 'About water and wastewater PPPs',
                            ])
                            ->default('about_the_hub')
                            ->helperText('Select the category for this FAQ'),
                        Forms\Components\Toggle::make('is_active')
                            ->default(true)
                            ->required(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->searchable()
                    ->limit(50),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->formatStateUsing(fn (string $state): string => match($state) {
                        'about_the_hub' => 'About the Hub',
                        'about_water_ppps' => 'About water and wastewater PPPs',
                        default => $state,
                    })
                    ->color(fn (string $state): string => match($state) {
                        'about_the_hub' => 'info',
                        'about_water_ppps' => 'success',
                        default => 'gray',
                    }),
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
                Tables\Filters\SelectFilter::make('category')
                    ->label('Category')
                    ->options([
                        'about_the_hub' => 'About the Hub',
                        'about_water_ppps' => 'About water and wastewater PPPs',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Active')
                    ->placeholder('All FAQs')
                    ->trueLabel('Active FAQs')
                    ->falseLabel('Inactive FAQs'),
            ])
            ->reorderable('sort')
            ->defaultSort('sort')
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
