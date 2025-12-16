<?php

namespace App\Filament\Resources\FaqResource\Pages;

use App\Filament\Resources\FaqResource;
use App\Models\Faq;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListFaqs extends ListRecords
{
    protected static string $resource = FaqResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('All FAQs')
                ->badge(Faq::count()),
            'about_the_hub' => Tab::make('About the Hub')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'about_the_hub'))
                ->badge(Faq::where('category', 'about_the_hub')->count()),
            'about_water_ppps' => Tab::make('About water and wastewater PPPs')
                ->modifyQueryUsing(fn (Builder $query) => $query->where('category', 'about_water_ppps'))
                ->badge(Faq::where('category', 'about_water_ppps')->count()),
        ];
    }
}
