<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Registration;
use App\Models\QrPass;

class NapanamVax extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'napanam:vax';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update vax_status in napanam qrpasses';

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

        $registrations = Registration::has('vaccine.dosages')->get();

        $bar = $this->output->createProgressBar(count($registrations));
        
        $this->info("Updatig NAPANAM for vax_status...");
        $bar->start();        
        
        foreach ($registrations as $r) {

            $vax_status = null;

            if ($r->first_dose) {
                $vax_status = 1;
                if ($r->second_dose) $vax_status = 2;
                if ($r->fully_vaccinated) $vax_status = 2;
            }

            if ($r->fully_vaccinated) {
                $vax_status = 2;
            }

            $qrpass = QrPass::find(intval($r->qr_pass_id));

            if (!is_null($qrpass)) {
                $qrpass->vax_status = $vax_status;
                $qrpass->save();
            }

            $bar->advance();            

        }

        $bar->finish();        

        return 0;
    }
}
