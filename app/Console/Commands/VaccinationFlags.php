<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;

class VaccinationFlags extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vaccination:flags';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Registration doses flags';

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
        $registrations = Registration::all();

        $bar = $this->output->createProgressBar(count($registrations));

        $this->info("Updating registrations vaccination flags please wait...");
        $bar->start();

        foreach ($registrations as $registration) {

            $vaccine = $registration->vaccine ?? null;
            $dosages = (is_null($vaccine)) ? null : $vaccine->dosages();

            // first dose screened
            $first_dosage = (is_null($dosages)) ? null : $dosages->where('dose', 1)->first();
            $first_dose_screened = $first_dosage->pre_assessment->screened ?? null;
            $registration->first_dose_screened = $first_dose_screened ?? false;

            $second_dosage = (is_null($dosages)) ? null : $dosages->where('dose', 2)->first();
            $second_dose_screened = $second_dosage->pre_assessment->screened ?? null;       
            $registration->second_dose_screened = $second_dose_screened ?? false;

            // first dose
            $first_dose = (is_null($first_dosage)) ? false : $first_dosage->date_of_vaccination != null;
            $registration->first_dose = $first_dose;

            // second dose
            $second_dose = (is_null($second_dosage)) ? false : $second_dosage->date_of_vaccination != null;
            $registration->second_dose = $second_dose;

            // fully vaccinated
            $registration->fully_vaccinated = $first_dose && $second_dose;

            $registration->save();

            $bar->advance();

        }

        $bar->finish();

        return 0;
    }
}
