<?php

namespace App\Filament\Resources\SliderCardResource\Pages;

use App\Filament\Resources\SliderCardResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateSliderCard extends CreateRecord
{
    protected static string $resource = SliderCardResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Convert expandable_items from array of objects to array of strings
        if (isset($data['expandable_items']) && is_array($data['expandable_items'])) {
            $data['expandable_items'] = array_column($data['expandable_items'], 'item');
        }
        
        return $data;
    }
}
