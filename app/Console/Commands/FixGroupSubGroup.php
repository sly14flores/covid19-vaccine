<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;

class FixGroupSubGroup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'prioritygroup:fix';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fix priority_group sub_priority_group wrong value from registration importing';

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

        foreach ($registrations as $registration) {
            $priority_group = $registration->priority_group;
            $exp_pg = explode(':',$priority_group);
            if (count($exp_pg)>1) {
                $registration->priority_group = $exp_pg[0];
            }
            $sub_priority_group = $registration->sub_priority_group;
            $exp_spg = explode(':',$sub_priority_group);
            if (count($exp_spg)>1) {
                $registration->sub_priority_group = $exp_spg[0];
            }
            $registration->save();
        }

        return 0;
    }
}
