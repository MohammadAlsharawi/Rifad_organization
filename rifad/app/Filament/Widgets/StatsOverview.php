<?php

namespace App\Filament\Widgets;

use App\Models\Donor;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Number of Donors', Donor::count())
                ->description('Total registered donors')
                ->descriptionIcon('heroicon-o-user-group')
                ->color('success')
                ->chart([5, 10, 15, 20, 25, 30]) 
                ->extraAttributes([
                    'class' => 'text-lg font-bold',
                ]),
        ];
    }
}
