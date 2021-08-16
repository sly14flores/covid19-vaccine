<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;

class FullyVaccinated extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fully:vaccinated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update registrations if fully vaccinated';

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
        $brands = config('constants.brands');

        $registrations = Registration::all();
        
        $bar = $this->output->createProgressBar(count($registrations));
        
        $this->info("Updating registrations for fully vaccinated...");
        $bar->start();
        
        foreach ($registrations as $registration) {

            $vaccine = $registration->vaccine ?? null;
            $dosages = (is_null($vaccine)) ? null : $vaccine->dosages();

            $fully_vaccinated = false;

            $doses = [];
            // first dose
            $first_dose = $registration->first_dose;
            $first_dosage = (is_null($dosages)) ? null : $dosages->where('dose', 1)->first();
            $brand_name = (is_null($first_dosage)) ? null : $first_dosage->brand_name;
            if ($first_dose && !is_null($registration->date_of_vaccination)) $doses[] = true;

            // second dose
            $second_dose = $registration->second_dose;
            if ($second_dose && !is_null($registration->date_of_vaccination)) $doses[] = true;
            
            if ($brand_name!=null) {
                $get_brand = collect($brands)->where('id',$brand_name)->first();
                $brand_doses = $get_brand['dosages'];
                if (count($doses) >= $brand_doses) {
                    $fully_vaccinated = true;
                }
            }            

            // fully vaccinated
            $registration->fully_vaccinated = $fully_vaccinated;

            $registration->save();

            $bar->advance();

        }

        $bar->finish();

        return 0;
    }
}
