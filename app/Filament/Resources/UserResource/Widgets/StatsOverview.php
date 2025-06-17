<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\ChartWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends ChartWidget
{
    protected static ?string $heading = 'Chart';

    protected function getData(): array
    {
        return [
            Stat::make('Utilisateurs', \App\Models\User::count())
                ->description('Total utilisateurs')
                ->chart([7, 3, 4, 5, 6, 3, 5])
                ->color('success'),

            Stat::make('Nouveaux inscrits', \App\Models\User::whereDate('created_at', today())->count())
                ->description('Aujourd\'hui')
                ->color('primary'),

            Stat::make('Taux de conversion', '21%')
                ->description('Visiteurs vers clients')
                ->color('warning'),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Utilisateurs', \App\Models\User::count())
                ->description('Total utilisateurs')
                ->chart([7, 3, 4, 5, 6, 3, 5])
                ->color('success'),

            Stat::make('Nouveaux inscrits', \App\Models\User::whereDate('created_at', today())->count())
                ->description('Aujourd\'hui')
                ->color('primary'),

            Stat::make('Taux de conversion', '21%')
                ->description('Visiteurs vers clients')
                ->color('warning'),
        ];
    }
}
