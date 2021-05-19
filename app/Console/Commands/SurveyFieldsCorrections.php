<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Survey;

use App\Traits\DOHHelpers;

class SurveyFieldsCorrections extends Command
{
    use DOHHelpers;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'survey:fields';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Correct survey gender, province, town_city, barangay invalid values';

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
        $surveys = Survey::all();

        $genders = ['01_Female'=>'Female','02_Male'=>'Male'];        

        $bar = $this->output->createProgressBar(count($surveys));
        $bar->start();
        foreach ($surveys as $survey) {

            if (isset($genders[$survey->gender])) {

                $survey->gender = $genders[$survey->gender];
                $survey->province = $this->dohToProvDesc($survey->province);
                $survey->town_city = $this->dohToMunDesc($survey->town_city);
                $survey->barangay = $this->dohToBrgyDesc($survey->barangay);

                $survey->save();

            }

            $bar->advance();
        }
        $bar->finish();

        return 0;
    }
}
