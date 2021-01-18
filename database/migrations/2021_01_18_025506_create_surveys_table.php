<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('qr_pass_id')->nullable();
            $table->string('last_name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('province')->nullable()->comment('Address');
            $table->string('town_city')->nullable()->comment('Address');
            $table->string('barangay')->nullable()->comment('Address');
            $table->string('frontline_health_workers')->nullable()->comment('Population Group');
            $table->string('senior_citizens')->nullable()->comment('Population Group');
            $table->string('uniformed_personnel')->nullable()->comment('Population Group');
            $table->string('teachers')->nullable()->comment('Population Group');
            $table->string('social_workers')->nullable()->comment('Population Group');
            $table->string('government_employees')->nullable()->comment('Population Group');
            $table->string('agriculture_group')->nullable()->comment('Population Group');
            $table->string('food_industry')->nullable()->comment('Population Group');
            $table->string('tranportation')->nullable()->comment('Population Group');
            $table->string('tourism')->nullable()->comment('Population Group');
            $table->string('persons_deprived_of_liberty')->nullable()->comment('Population Group');
            $table->string('persons_with_disability')->nullable()->comment('Population Group');
            $table->string('ofw')->nullable()->comment('Population Group');
            $table->string('others_population_group')->nullable()->comment('Population Group');
            $table->string('lung_disease')->nullable()->comment('Health Condition');
            $table->string('kidney_disease')->nullable()->comment('Health Condition');
            $table->string('diabetes')->nullable()->comment('Health Condition');
            $table->string('high_blood_pressure')->nullable()->comment('Health Condition');
            $table->string('cancer')->nullable()->comment('Health Condition');
            $table->string('leukemia')->nullable()->comment('Health Condition');
            $table->string('hiv')->nullable()->comment('Health Condition');
            $table->string('mental_problem')->nullable()->comment('Health Condition');
            $table->string('others_health_condition')->nullable()->comment('Health Condition');
            $table->string('none_of_the_above')->nullable()->comment('Health Condition');
            $table->string('yes_pregnant_baby')->nullable()->comment('Pregnant or planning to have a baby');
            $table->string('no_pregnant_baby')->nullable()->comment('Pregnant or planning to have a baby');
            $table->string('not_sure_pregnant_baby')->nullable()->comment('Pregnant or planning to have a baby');
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
        Schema::dropIfExists('surveys');
    }
}
