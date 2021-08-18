<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Registration;

use Illuminate\Database\Eloquent\Builder;
use App\Traits\Dumper;

class TestSomething extends Command
{

    use Dumper;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:something';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Just test something';

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
        
        return 0;
    }
}
