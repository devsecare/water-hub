<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SeoMetaResource\Pages;
use App\Filament\Resources\SeoMetaResource\RelationManagers;
use App\Models\SeoMeta;
use App\Services\SeoHelper;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SeoMetaResource extends Resource
{
    protected static ?string $model = SeoMeta::class;

    protected static ?string $navigationIcon = 'heroicon-o-magnifying-glass';

    protected static ?string $navigationLabel = 'SEO Management';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?int $navigationSort = 10;

    protected static ?string $slug = 'seo-metas';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Page Information')
                    ->schema([
                        Forms\Components\Select::make('page_route')
                            ->label('Page Route')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->options(SeoHelper::getAvailableRoutes())
                            ->searchable()
                            ->preload()
                            ->helperText('Select the route name for this page. Type to search. For dynamic pages like /resources/{slug}, use the route name (e.g., resources.show). If your route is not listed, it may need to be added to the system.'),
                        Forms\Components\TextInput::make('page_url')
                            ->label('Page URL Pattern')
                            ->maxLength(255)
                            ->helperText('Optional: Full URL pattern for dynamic pages. Leave empty for static routes. Example: /resources/some-slug'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Basic Meta Tags')
                    ->schema([
                        Forms\Components\TextInput::make('meta_title')
                            ->label('Meta Title')
                            ->maxLength(255)
                            ->helperText('Recommended: 50-60 characters'),
                        Forms\Components\Textarea::make('meta_description')
                            ->label('Meta Description')
                            ->rows(3)
                            ->maxLength(500)
                            ->helperText('Recommended: 150-160 characters'),
                        Forms\Components\Textarea::make('meta_keywords')
                            ->label('Meta Keywords')
                            ->rows(2)
                            ->helperText('Comma-separated keywords (optional)'),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Open Graph (Social Sharing)')
                    ->schema([
                        Forms\Components\TextInput::make('og_title')
                            ->label('OG Title')
                            ->maxLength(255)
                            ->helperText('Title for social media sharing. If empty, meta title will be used.'),
                        Forms\Components\Textarea::make('og_description')
                            ->label('OG Description')
                            ->rows(3)
                            ->helperText('Description for social media sharing. If empty, meta description will be used.'),
                        Forms\Components\TextInput::make('og_image')
                            ->label('OG Image URL')
                            ->url()
                            ->maxLength(500)
                            ->helperText('Full URL to the image for social sharing (recommended: 1200x630px)'),
                    ])
                    ->columns(1),

                Forms\Components\Section::make('Additional Settings')
                    ->schema([
                        Forms\Components\Select::make('twitter_card')
                            ->label('Twitter Card Type')
                            ->options([
                                'summary' => 'Summary',
                                'summary_large_image' => 'Summary Large Image',
                            ])
                            ->default('summary_large_image')
                            ->helperText('Type of Twitter card to display'),
                        Forms\Components\TextInput::make('canonical_url')
                            ->label('Canonical URL')
                            ->url()
                            ->maxLength(500)
                            ->helperText('Canonical URL for this page. If empty, current URL will be used.'),
                        Forms\Components\TextInput::make('robots')
                            ->label('Robots Meta')
                            ->default('index, follow')
                            ->helperText('e.g., "index, follow", "noindex, nofollow", etc.'),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Active')
                            ->default(true)
                            ->helperText('Only active SEO entries will be used on the frontend'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('page_route')
                    ->label('Route')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('page_url')
                    ->label('URL Pattern')
                    ->searchable()
                    ->limit(30)
                    ->toggleable(),
                Tables\Columns\TextColumn::make('meta_title')
                    ->label('Title')
                    ->searchable()
                    ->limit(40)
                    ->wrap(),
                Tables\Columns\TextColumn::make('meta_description')
                    ->label('Description')
                    ->searchable()
                    ->limit(50)
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                    ->placeholder('All')
                    ->trueLabel('Active only')
                    ->falseLabel('Inactive only'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('page_route');
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
            'index' => Pages\ListSeoMetas::route('/'),
            'create' => Pages\CreateSeoMeta::route('/create'),
            'edit' => Pages\EditSeoMeta::route('/{record}/edit'),
        ];
    }
}
