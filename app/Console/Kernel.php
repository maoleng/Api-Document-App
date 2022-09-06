<?php

namespace App\Console;

use App\Console\Commands\CleanCloudStorageAndDatabase;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\CleanCloudStorageAndDatabase::class,

    ];


    protected function schedule(Schedule $schedule)
    {
        $schedule->command(CleanCloudStorageAndDatabase::COMMAND)->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
