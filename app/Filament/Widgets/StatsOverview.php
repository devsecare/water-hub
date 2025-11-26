<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\DownloadLog;
use App\Models\Item;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Categories', Category::count())
                ->description('All categories in the system')
                ->descriptionIcon('heroicon-m-folder')
                ->color('success'),
            
            Stat::make('Total Items', Item::count())
                ->description('All items in the system')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('info'),
            
            Stat::make('Total Downloads', DownloadLog::count())
                ->description('All download logs')
                ->descriptionIcon('heroicon-m-arrow-down-tray')
                ->color('warning'),
            
            Stat::make('Total Users', User::count())
                ->description('All registered users')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary'),
        ];
    }
}

