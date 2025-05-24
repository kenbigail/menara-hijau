<?php

namespace App;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Foundation\Inspiring;
use App\Console\Commands\UpdateTenantStatus;

// class Console extends ConsoleKernel
// {
//     /**
//      * Define the application's command schedule.
//      */
//     protected function schedule(Schedule $schedule): void
//     {
//         $schedule->command(UpdateTenantStatus::class)->dailyAt('00:00')->timezone('Asia/Jakarta');
//     }

//     /**
//      * Register the commands for the application.
//      */
//     protected function commands(): void
//     {
//         $this->load(__DIR__.'/Commands');

//         require base_path('routes/console.php');
//     }
// }
