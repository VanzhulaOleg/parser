<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\Parser::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('parser:start');
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Comands');
        //Comands
        require base_path('routes/console.php');
    }
}
