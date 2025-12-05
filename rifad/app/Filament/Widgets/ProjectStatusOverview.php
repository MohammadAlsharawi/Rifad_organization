<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class ProjectStatusOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Completed Projects', Project::where('status', 'completed')->count())
                ->color('success') // أخضر مخصص
                ->icon('heroicon-o-check-circle')
                ->chart([5, 10, 15, 20, 25, 30])
                ->description('Total successfully completed projects')
                ->descriptionIcon('heroicon-o-check'),

            Stat::make('In Progress Projects', Project::where('status', 'in_progress')->count())
                ->color('warning') // برتقالي مخصص
                ->icon('heroicon-o-clock')
                ->chart([5, 10, 15, 20, 25, 30])
                ->description('Projects currently in progress')
                ->descriptionIcon('heroicon-o-arrow-path'),

            Stat::make('Failed Projects', Project::where('status', 'failed')->count())
                ->color('danger') // أزرق مخصص
                ->icon('heroicon-o-x-circle')
                ->chart([5, 10, 15, 20, 25, 30])
                ->description('Projects that did not succeed')
                ->descriptionIcon('heroicon-o-x-mark'),
        ];
    }
}
