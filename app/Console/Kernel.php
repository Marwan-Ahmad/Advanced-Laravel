<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
         $schedule->command('app:useradd')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}


/*

1- 2/2/2024
2-26/1/2024
3-28/9/2023
4-8/7/2023
5-12/6/2023
6-3/6/2023
7-22/5/2023
8-19/5/2023
9- 8/5/2023
10-25/4/2023
11-17/4/2023
12-13/4/2023
13-6/4/2023
14-2/4/2023

*/