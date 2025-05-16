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
        $totalVisitors = Visitor::whereNot('name', 'root')
            ->select('gate', DB::raw('count(*) as total'))
            ->groupBy('gate')
            ->get()
            ->keyBy('gate');

        // Ambil visitor hari ini, grup berdasarkan gate
        $todayVisitors = Visitor::whereNot('name', 'root')
            ->whereDate('created_at', Carbon::today())
            ->select('gate', DB::raw('count(*) as today'))
            ->groupBy('gate')
            ->get()
            ->keyBy('gate');

        // Gabungkan berdasarkan gate
        foreach ($totalVisitors as $gate => $totalData) {
            $todayCount = $todayVisitors[$gate]->today ?? 0;
            $totalCount = $totalData->total;

            $stats[] = Stat::make('Visitor ' . $gate . ' (Today)', $todayCount)
                ->description('Total ' . $totalCount)
                ->color('success');
        }

        return $stats;
    }
}
