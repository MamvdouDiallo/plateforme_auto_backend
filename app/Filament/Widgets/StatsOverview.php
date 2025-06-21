<?php

namespace App\Filament\Widgets;

use App\Models\Category;
use App\Models\Marque;
use App\Models\ModelVehicule;
use App\Models\User;
use App\Models\Vehicule;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Users', User::count())
                ->icon('heroicon-o-users')
                ->description('Total number of registered users')
                ->descriptionIcon('heroicon-o-information-circle')
                ->color('primary')
                ->chart([7, 5, 8, 6, 9, 10, 12, 11, 13, 14, 15, 16]),
                // Uncomment the next line to add a label
               // ->label('Users')
               // ->value(100) // Replace with dynamic value
             //   ->color('primary'),

                Stat::make('Total Voitures', Vehicule::count())
                ->icon('heroicon-o-truck')
                ->description('Total number of registered cars')
                ->descriptionIcon('heroicon-o-information-circle')
                ->color('danger')
                ->chart([7, 5, 8, 6, 9, 10, 12, 11, 13, 14, 15, 16]),

                 Stat::make('Total Marques', Marque::count())
                ->icon('heroicon-o-truck')
                ->description('Total number of registered cars')
                ->descriptionIcon('heroicon-o-information-circle')
                ->color('success')
                ->chart([7, 5, 8, 6, 9, 10, 12, 11, 13, 14, 15, 16]),





                Stat::make('Total Catgories', Category::count())
                ->icon('heroicon-o-users')
                ->description('Total number of registered categories')
                ->descriptionIcon('heroicon-o-rectangle-stack')
                ->color('primary')
                ->chart([7, 5, 8, 6, 9, 10, 12, 11, 13, 14, 15, 16]),
                // Uncomment the next line to add a label
               // ->label('Users')
               // ->value(100) // Replace with dynamic value
             //   ->color('primary'),


                 Stat::make('Total Models', ModelVehicule::count())
                ->icon('heroicon-o-truck')
                ->description('Total number of registered Models')
                ->descriptionIcon('heroicon-o-square-3-stack-3d')
                ->color('success')
                ->chart([7, 5, 8, 6, 9, 10, 12, 11, 13, 14, 15, 16]),








                // Uncomment the next line to add a label
               // ->label('Users')
               // ->value(100) // Replace with dynamic value
             //   ->color('primary'),
        ];

    }
}
