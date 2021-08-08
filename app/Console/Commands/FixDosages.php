<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Dosage;

class FixDosages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dosages:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update vaccination_facility';

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

        $this->info("Updating dosages...");
        $bar->start();

        foreach ($dosages as $dosage) {

            // $encoder_user_id = null;
            $user = $dosage->user;
            $hospital = $user->userHospital ?? null;
            $vaccination_facility = $hospital->id ?? null;

            // $dosage->encoder_user_id = $encoder_user_id;
            if (is_null($dosage->vaccination_facility)) $dosage->vaccination_facility = $vaccination_facility;

            $dosage->save();

            $bar->advance();

        }

        $bar->finish();

        return 0;
    }
}
