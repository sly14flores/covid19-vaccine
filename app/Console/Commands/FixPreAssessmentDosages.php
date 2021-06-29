<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\PreAssessment;

class FixPreAssessmentDosages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'preassessment:dosages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update pre assessment dosages based from dosage';

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
        $pres = PreAssessment::all();

        $bar = $this->output->createProgressBar(count($pres));

        $this->info("Updating pre assessments dosages...");
        $bar->start();

        foreach ($pres as $pre) {

            $dose = $pre->dosage->dose;

            $pre->dose = $dose;
            $pre->save();

            $bar->advance();

        }

        $bar->finish();

        return 0;
    }
}
