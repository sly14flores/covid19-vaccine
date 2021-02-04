<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('qr_pass_id')->nullable();
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('suffix')->nullable();
            $table->string('birthdate')->nullable();
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('barangay')->nullable();
            $table->string('town_city')->nullable();
            $table->string('province')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('category')->nullable();
            $table->string('category_id')->nullable();
            $table->string('category_id_no')->nullable();
            $table->string('employment_status')->nullable();
            $table->string('profession')->nullable();
            $table->string('philhealth')->nullable();
            $table->string('employer_name')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('employer_lgu')->nullable();
            $table->string('employer_contact_no')->nullable();
            $table->tinyInteger('pregnancy_status')->nullable();
            $table->tinyInteger('with_allergy')->nullable();
            $table->string('allergy')->nullable();
            $table->string('with_allergy_others')->nullable();
            $table->tinyInteger('with_comorbidity')->nullable();
            $table->string('comorbidity')->nullable();
            $table->string('with_comorbidity_others')->nullable();
            $table->tinyInteger('diagnosed')->nullable();
            $table->string('covid_classification')->nullable();
            $table->string('diagnosed_date')->nullable();
            $table->tinyInteger('consent_vaccination')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
