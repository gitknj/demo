<?php

namespace App\Console;

use App\Http\Controllers\CronController;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Console\Commands\SendCronVal;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
      //  $schedule->call(new CronController)->everySecond();
       /*$schedule->call(function () {
        DB::table('crontests')->insert(['cronval'=>now()]);
    })->everySecond();*/
       $schedule->command('app:send-cron-val')->everySecond();    

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
