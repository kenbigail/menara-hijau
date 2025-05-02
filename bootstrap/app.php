<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Log;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withCommands() // This loads commands from app/Console/Commands
    ->withSchedule(function ($schedule) {
        $schedule->command('tenants:update-status')
            ->everyMinute()
            ->timezone('Asia/Jakarta')
            ->appendOutputTo(storage_path('logs/tenant-status.log'))
            ->onFailure(function () {
                Log::error('Tenant status update failed!');
            });
    })
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'superAdmin' => \App\Http\Middleware\SuperAdminMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })
    ->create();
