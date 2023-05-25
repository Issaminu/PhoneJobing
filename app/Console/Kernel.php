<?php

namespace App\Console;

use App\Models\Client;
use Illuminate\Console\Scheduling\Schedule;
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
        $schedule->call(function () { //Fake 'WRITE' operation to make PlanetScale free tier shut up
            $clientFind = Client::where('name', '=', "Adil Qadour")->first();
            $clientFind->zip = strval(intval($clientFind->zip) + 1);
            $clientFind->update();
        })->weekly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}