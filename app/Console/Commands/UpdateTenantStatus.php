<?php

namespace App\Console\Commands;

use App\Models\Tenant;
use Illuminate\Console\Command;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateTenantStatus extends Command
{
    protected $signature = 'tenants:update-status';
    protected $description = 'Update tenant statuses based on dates';

    public function handle()
    {
        $startTime = microtime(true);
        $today = Carbon::today('Asia/Jakarta');

        Log::info("=== Tenant Status Update Started ===");
        $this->info("Running at: " . $today->format('Y-m-d H:i:s'));

        // Get counts BEFORE updates
        $initialCounts = [
            'finished' => Tenant::whereDate('date_end', '<', $today)->count(),
            'ongoing' => Tenant::whereDate('date_start', '<=', $today)
                            ->whereDate('date_end', '>=', $today)
                            ->count(),
            'waiting' => Tenant::whereDate('date_start', '>', $today)->count()
        ];

        DB::enableQueryLog();

        // Perform updates
        $updatedCounts = [
            'finished' => Tenant::whereDate('date_end', '<', $today)
                            ->where('status', '!=', 'finished')
                            ->update(['status' => 'finished']),

            'ongoing' => Tenant::whereDate('date_start', '<=', $today)
                            ->whereDate('date_end', '>=', $today)
                            ->where('status', '!=', 'ongoing')
                            ->update(['status' => 'ongoing']),

            'waiting' => Tenant::whereDate('date_start', '>', $today)
                            ->where('status', '!=', 'waiting')
                            ->update(['status' => 'waiting'])
        ];

        // Get counts AFTER updates
        $finalCounts = [
            'finished' => Tenant::whereDate('date_end', '<', $today)->count(),
            'ongoing' => Tenant::whereDate('date_start', '<=', $today)
                            ->whereDate('date_end', '>=', $today)
                            ->count(),
            'waiting' => Tenant::whereDate('date_start', '>', $today)->count()
        ];

        // Generate report
        $report = [
            'date' => $today->format('Y-m-d'),
            'timezone' => 'Asia/Jakarta',
            'initial_counts' => $initialCounts,
            'updated_records' => $updatedCounts,
            'final_counts' => $finalCounts,
            'execution_time' => round(microtime(true) - $startTime, 2) . 's',
            'queries' => DB::getQueryLog()
        ];

        // Output results
        $this->info("=== Status Update Report ===");
        $this->table(
            ['Status', 'Initial', 'Updated', 'Final'],
            [
                ['Finished', $initialCounts['finished'], $updatedCounts['finished'], $finalCounts['finished']],
                ['Ongoing', $initialCounts['ongoing'], $updatedCounts['ongoing'], $finalCounts['ongoing']],
                ['Waiting', $initialCounts['waiting'], $updatedCounts['waiting'], $finalCounts['waiting']]
            ]
        );

        Log::info("Tenant Status Update Report", $report);
        $this->info("Completed in " . $report['execution_time']);
    }
}
