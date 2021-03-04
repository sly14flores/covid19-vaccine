<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyTinyintegersTableRegistrations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('direct_interaction')->change();
            $table->string('pregnancy_status')->change();
            $table->string('with_allergy')->change();
            $table->string('with_comorbidity')->change();
            $table->string('diagnosed')->change();
            $table->string('consent_vaccination')->change();
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
