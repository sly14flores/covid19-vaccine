<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Comorbitities extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('hypertension')->nullable()->after('with_allergy_others');
            $table->string('heart_disease')->nullable()->after('hypertension');
            $table->string('kidney_disease')->nullable()->after('heart_disease');
            $table->string('diabetes_mellitus')->nullable()->after('kidney_disease');
            $table->string('bronchial_asthma')->nullable()->after('diabetes_mellitus');
            $table->string('immuno_deficiency_status')->nullable()->after('bronchial_asthma');
            $table->string('cancer')->nullable()->after('immuno_deficiency_status');
            $table->string('comorbidity_others')->nullable()->after('cancer');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('registrations', function (Blueprint $table) {
            //
        });
    }
}
