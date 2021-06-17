<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScreeningVitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('screening_vitals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosage_id')->constrained('dosages')
            ->onDelete('cascade')
            ->onUpdate('no action');
            $table->integer('dose')->nullable();
            $table->date('date_collected')->nullable();
            $table->time('time_collected')->nullable();
            $table->string('systolic')->nullable();
            $table->string('diastolic')->nullable();
            $table->string('pulse_rate')->nullable();
            $table->string('temperature')->nullable();
            $table->string('respiratory_rate')->nullable();
            $table->string('oxygen')->nullable();
            $table->string('pain_score')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('screening_vitals');
    }
}
