<?php

namespace App\Console;
use App\Models\Item;
use App\Models\ImportFile;
use App\Models\Brands;
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
        // call a command funtion to update the data in every hour 
        $schedule->call(function()
        {
            // update wheels product data every hour 
            // get the first uploaded excel file and updated it in every hour once the status is 0
            // call traits class quickbook function 
            if(ImportFile::where('is_updated',0)->count() > 0)
            {
                // prioritize first the file that is not yet been updated by the server 
                $import_file = ImportFile::where('is_updated',0)->get()->first();

                $this->UpdateDataPerHour($import_file->id);

                \Log::info($import_file->id);
                //provide logs for every data has been executed per hour 
            }

        })->everyMinute();

        // ->everyFiveMinutes()
        // set hourly update
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
