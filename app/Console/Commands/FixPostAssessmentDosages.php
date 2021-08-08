<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\PostAssessment;

class FixPostAssessmentDosages extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'postassessment:dosages';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update post assessment dosages based from dosage';

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
        $posts = PostAssessment::all();

        $bar = $this->output->createProgressBar(count($posts));

        $this->info("Updating post assessments dosages...");
        $bar->start();

        foreach ($posts as $post) {

            $dose = $post->dosage->dose;

            $post->dose = $dose;
            $post->save();

            $bar->advance();

        }

        $bar->finish();

        return 0;
    }
}
