<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Allergies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('drug_allergy')->nullable()->after('pregnancy_status');
            $table->string('food_allergy')->nullable()->after('drug_allergy');
            $table->string('insect_allergy')->nullable()->after('food_allergy');
            $table->string('latex_allergy')->nullable()->after('insect_allergy');
            $table->string('mold_allergy')->nullable()->after('latex_allergy');
            $table->string('pet_allergy')->nullable()->after('mold_allergy');
            $table->string('pollen_allergy')->nullable()->after('pet_allergy');
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
