<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;

class CityMunCode extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'towncitycode:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update town_city_code value all rows';

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

        $bar->start();

        foreach ($registrations as $registration) {
            $town_city = explode("_",$registration->town_city);
            $registration->town_city_code = $town_city[1];
            $registration->save();
            $bar->advance();
        }

        $bar->finish();

        return 0;
    }
}
