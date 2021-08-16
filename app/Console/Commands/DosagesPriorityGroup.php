<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Dosage;

class DosagesPriorityGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dosages:priorityGroup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update dosages priority group';

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

        $dosages = Dosage::all();

        $bar = $this->output->createProgressBar(count($dosages));
        
        $this->info("Updating dosages for priority group...");
        $bar->start();

        foreach ($dosages as $dosage) {

            $dosage->priority_group = $dosage->vaccine->registration->priority_group ?? null;

            $dosage->save();

            $bar->advance();            

        }

        $bar->finish();        

        return 0;
    }
}
