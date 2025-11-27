<?php

namespace App\Filament\Resources\SliderCardResource\Pages;

use App\Filament\Resources\SliderCardResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSliderCard extends EditRecord
{
    protected static string $resource = SliderCardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Convert expandable_items from array of strings to array of objects for Repeater
        if (isset($data['expandable_items']) && is_array($data['expandable_items']) && !empty($data['expandable_items'])) {
            // Check if already in object format
            if (!isset($data['expandable_items'][0]['item'])) {
                $data['expandable_items'] = array_map(fn($item) => ['item' => $item], $data['expandable_items']);
            }
        }
        
        return $data;
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Convert expandable_items from array of objects to array of strings
        if (isset($data['expandable_items']) && is_array($data['expandable_items'])) {
            $data['expandable_items'] = array_column($data['expandable_items'], 'item');
        }
        
        return $data;
    }
}
