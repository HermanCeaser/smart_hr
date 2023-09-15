<?php

namespace App\Filament\Admin\Widgets;

use App\Models\Department;
use App\Models\Designation;
use App\Models\Staff;
use Filament\Facades\Filament;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = null;

    protected function getStats(): array
    {

        $tenant = Filament::getTenant();
        $employee_count = Staff::whereBelongsTo($tenant)->count();
        return [
            Stat::make('Employee Count', $employee_count)
                ->icon('heroicon-o-users')
                ->description('Number of Employees')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success')
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
            Stat::make('Departmants', Department::whereBelongsTo($tenant)->count())
                ->icon('heroicon-o-server-stack')
                ->description('Number of Departments')
                ->color('warning'),
            Stat::make('Designations', Designation::whereBelongsTo($tenant)->count())
                ->icon('heroicon-o-rectangle-stack')
                ->description('Number of designations')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('info'),
        ];
    }
}
