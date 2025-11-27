<?php

namespace App\Filament\Resources\SliderCardResource\Pages;

use App\Filament\Resources\SliderCardResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSliderCards extends ListRecords
{
    protected static string $resource = SliderCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
