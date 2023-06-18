<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use App\Models\AmalYaumi;
use App\Models\AmalYaumiMapping;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->call(function () {
          $amalYaumiMaster = AmalYaumi::where('status', '1')->get();

          foreach($amalYaumiMaster as $master){
            AmalYaumiMapping::create([
              'user_id' => $master->user_id,
              'do_date' => date("Y-m-d")
            ]);
          }
        })->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
