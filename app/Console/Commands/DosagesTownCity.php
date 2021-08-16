<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Dosage;

class DosagesTownCity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dosages:townCity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update dosages town city code';

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
        
        $this->info("Updating dosages for town city code...");
        $bar->start();

        foreach ($dosages as $dosage) {

            $dosage->town_city_code = $dosage->vaccine->registration->town_city_code ?? null;

            $dosage->save();

            $bar->advance();            

        }

        $bar->finish();        

        return 0;
    }
}
