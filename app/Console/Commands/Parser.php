<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use App\Services\ServiceParser;

class Parser extends Command
{
    protected $signature = 'parser:start';
    protected $description = 'It is site parser';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $pars = new ServiceParser();
        $pars->index();
        $this->info('Parser successful!');

        Log::error("Oops, something went wrong!");
    }
}
