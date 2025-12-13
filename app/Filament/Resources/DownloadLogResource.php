<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DownloadLogResource\Pages;
use App\Filament\Resources\DownloadLogResource\RelationManagers;
use App\Models\DownloadLog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DownloadLogResource extends Resource
{
    protected static ?string $model = DownloadLog::class;

    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-tray';

    protected static ?string $navigationGroup = 'Content';

    protected static ?string $navigationLabel = 'Download Logs';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Download Information')
                    ->schema([
                        Forms\Components\TextInput::make('file_id')
                            ->label('File ID (Legacy)')
                            ->disabled()
                            ->dehydrated()
                            ->helperText('File downloads are now tracked via media. This field is for legacy records only.'),
                        Forms\Components\Select::make('media_id')
                            ->label('Media (Featured Image)')
                            ->relationship('media', 'name')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->dehydrated()
                            ->helperText('For featured images'),
                        Forms\Components\Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->disabled()
                            ->dehydrated()
                            ->required(),
                        Forms\Components\DateTimePicker::make('downloaded_at')
                            ->label('Downloaded At')
                            ->default(now())
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->displayFormat('Y-m-d H:i:s'),
                    ])
                    ->columns(2),

                Forms\Components\Section::make('Tracking Information')
                    ->schema([
                        Forms\Components\TextInput::make('ip_address')
                            ->label('IP Address')
                            ->maxLength(45)
                            ->ip()
                            ->disabled()
                            ->dehydrated()
                            ->helperText('IP address of the user who downloaded the file'),
                        Forms\Components\Textarea::make('user_agent')
                            ->label('User Agent')
                            ->rows(3)
                            ->maxLength(500)
                            ->disabled()
                            ->dehydrated()
                            ->helperText('Browser and device information')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(function (Builder $query) {
                // Ensure we don't try to load the file relationship since files table was dropped
                // Only load media and user relationships
                return $query->with(['media', 'user']);
            })
            ->columns([
                Tables\Columns\TextColumn::make('file_id')
                    ->label('File ID (Legacy)')
                    ->searchable()
                    ->sortable()
                    ->toggleable()
                    ->default('—')
                    ->placeholder('—')
                    ->formatStateUsing(fn ($state) => $state ? "File ID: {$state}" : '—'),
                Tables\Columns\TextColumn::make('media.name')
                    ->label('Media (Featured Image)')
                    ->searchable()
                    ->sortable()
                    ->limit(30)
                    ->default('—')
                    ->placeholder('—'),
                Tables\Columns\TextColumn::make('type')
                    ->label('Type')
                    ->badge()
                    ->color(fn ($record) => $record->media_id ? 'info' : 'gray')
                    ->getStateUsing(fn ($record) => $record->media_id ? 'Media' : ($record->file_id ? 'Legacy File' : '—')),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('User')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ip_address')
                    ->label('IP Address')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                Tables\Columns\TextColumn::make('user_agent')
                    ->label('User Agent')
                    ->searchable()
                    ->limit(50)
                    ->tooltip(fn ($record) => $record->user_agent)
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('downloaded_at')
                    ->label('Downloaded At')
                    ->dateTime()
                    ->sortable()
                    ->since()
                    ->description(fn ($record) => $record->downloaded_at?->format('Y-m-d H:i:s')),
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
                Tables\Filters\Filter::make('has_file_id')
                    ->label('Has Legacy File ID')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('file_id')),
                Tables\Filters\SelectFilter::make('media_id')
                    ->label('Media (Featured Image)')
                    ->relationship('media', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('download_type')
                    ->label('Download Type')
                    ->form([
                        Forms\Components\Select::make('type')
                            ->options([
                                'legacy_file' => 'Legacy File (Old System)',
                                'media' => 'Media (Featured Image)',
                            ])
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['type'] === 'legacy_file',
                                fn (Builder $query): Builder => $query->whereNotNull('file_id'),
                            )
                            ->when(
                                $data['type'] === 'media',
                                fn (Builder $query): Builder => $query->whereNotNull('media_id'),
                            );
                    }),
                Tables\Filters\SelectFilter::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->searchable()
                    ->preload(),
                Tables\Filters\Filter::make('downloaded_at')
                    ->form([
                        Forms\Components\DatePicker::make('downloaded_from')
                            ->label('Downloaded From'),
                        Forms\Components\DatePicker::make('downloaded_until')
                            ->label('Downloaded Until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['downloaded_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('downloaded_at', '>=', $date),
                            )
                            ->when(
                                $data['downloaded_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('downloaded_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('downloaded_at', 'desc');
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
            'index' => Pages\ListDownloadLogs::route('/'),
            'view' => Pages\ViewDownloadLog::route('/{record}'),
        ];
    }
}
