<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Country;
use App\Models\Employee;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'US')->withCount('employees')->first();
        $uk = Country::where('country_code', 'UK')->withCount('employees')->first();
        $my = Country::where('country_code', 'MY')->withCount('employees')->first();
        $sg = Country::where('country_code', 'SG')->withCount('employees')->first();

        return [
            Card::make('All Employees', Employee::all()->count()),
            Card::make('US Employees', $us ? $us->employees_count : 0)
                ->description($us->name)
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('UK Employees', $uk ? $uk->employees_count : 0)
                ->description($uk->name)
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('MY Employees', $my ? $my->employees_count : 0)
                ->description($my->name)
                ->descriptionIcon('heroicon-s-trending-up'),
            Card::make('SG Employees', $sg ? $sg->employees_count : 0)
                ->description($sg->name)
                ->descriptionIcon('heroicon-s-trending-up'),
        ];
    }
}
