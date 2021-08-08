<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Registration;
use App\Models\Vaccine;
use App\Models\Dosage;
use App\Models\PreAssessment;
use App\Models\PostAssessment;
use App\Models\Aefi;
use App\Models\MonitoringVital;
use App\Models\ScreeningVital;

class DeleteRegistration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'registration:delete {qr_pass_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete registration data and all related tables';

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

        $qr_pass_id = $this->argument('qr_pass_id');

        $registration = Registration::where('qr_pass_id',$qr_pass_id)->first();
        if (!is_null($registration)) $registration->delete();
        $vaccine = Vaccine::where('qr_pass_id',$qr_pass_id)->first();
        if (!is_null($vaccine)) {
            $dosage = Dosage::where('vaccine_id',$vaccine->id)->first();
            if (!is_null($dosage)) {
                $pre = PreAssessment::where('dosage_id',$dosage->id)->first();
                if (!is_null($pre)) $pre->delete();
                $post = PostAssessment::where('dosage_id',$dosage->id)->first();
                if (!is_null($post)) $post->delete();
                $aefi = Aefi::where('dosage_id',$dosage->id)->first();
                if (!is_null($aefi)) $aefi->delete();
                $screening = MonitoringVital::where('dosage_id',$dosage->id)->first();
                if (!is_null($screening)) $screening->delete();
                $monitoring = MonitoringVital::where('dosage_id',$dosage->id)->first();
                if (!is_null($monitoring)) $monitoring->delete();
                if (!is_null($dosage)) $dosage->delete();
            }
            $vaccine->delete();
        }

        $this->info("$qr_pass_id deleted");

        return 0;
    }
}
