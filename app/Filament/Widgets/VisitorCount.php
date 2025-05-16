<?php

namespace App\Filament\Widgets;

use App\Models\Visitor;
use Carbon\Carbon;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class VisitorCount extends BaseWidget
{
    protected function getStats(): array
    {
        $stats = [];
        $visitors = Visitor::whereNot('name', 'root')
            // ->whereDate('created_at', Carbon::today())
            // ->select('gate', DB::raw('count(*) as today'))
            ->groupBy('gate')
            ->get()
            ->sortBy('gate')
            ->keyBy('gate');

        foreach ($visitors as $visitor) {
            $todayCount = Visitor::where('gate', $visitor->gate)
                ->whereDate('created_at', Carbon::today())
                ->count();

            $totalCount = Visitor::where('gate', $visitor->gate)->count();

            $stats[] = Stat::make('Visitor ' . $visitor->gate . ' (Today)', $todayCount)
                ->description('Total ' . $totalCount)
                ->color('success');
        }

        return $stats;
    }
}
