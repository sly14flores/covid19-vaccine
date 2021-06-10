<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBloodPressureOxygenSaturationPulseRateToPostAssessments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_assessments', function (Blueprint $table) {
            $table->string('blood_pressure')->nullable()->after('assessments');
            $table->string('oxygen_saturation')->nullable()->after('blood_pressure');
            $table->string('pulse_rate')->nullable()->after('oxygen_saturation');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_assessments', function (Blueprint $table) {
            //
        });
    }
}
