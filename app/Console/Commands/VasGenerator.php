<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Dosage;

use Carbon\Carbon;

class VasGenerator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'vas:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate VAS reports';

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

        $date = "2021-06-22";
        $fileName = "VAS Report {$date}";

        $this->info("Generating VAS for ".Carbon::parse($date)->format("F j, Y"));

        // $dosages = Dosage::where('date_of_vaccination',$date)->get();

        // $bar = $this->output->createProgressBar(count($dosages));

        $headers = [
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        ];

        $file = fopen('php://output', 'w');

        $columns = [
            "CATEGORY",
            "UNIQUE_PERSON_ID",
            "PWD",
            "Indigenous Member",
            "LAST_NAME",
            "FIRST_NAME",
            "MIDDLE_NAME",
            "SUFFIX",
            "CONTACT_NO",
            "REGION",
            "PROVINCE",
            "MUNI_CITY",
            "BARANGAY",
            "SEX",
            "BIRTHDATE",
            "DEFERRAL",
            "REASON_FOR_DEFERRAL",
            "VACCINATION_DATE",
            "VACCINE_MANUFACTURER_NAME",
            "BATCH_NO",
            "LOT_NO",
            "BAKUNA_CENTER_CBCR_ID",
            "VACCINATOR_NAME",
            "1ST_DOSE",
            "2ND_DOSE",
            "Adverse Event",
            "Adverse Event Condition",
        ];

        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);
        fclose($file);      

        // $bar->start();

        // $bar->advance();

        // $bar->finish();

        return 0;
    }
}
