<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

// use App\Jobs\ImportInoculationMonitorJob;
use App\Events\ImportInoculationMonitor;

class TestBroadcastImportInoculationMonitor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inoculationImport:monitor';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test broadcast for inoculation import monitor';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {      
        // ImportInoculationMonitorJob::dispatch();
        for ($i=1; $i<=1000; $i++) {
            event(new ImportInoculationMonitor(209,['class'=>'info','text'=>'Hello, World']));
        }

        return 0;
    }
}
