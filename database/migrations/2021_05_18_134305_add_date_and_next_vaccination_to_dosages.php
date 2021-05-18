<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDateAndNextVaccinationToDosages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dosages', function (Blueprint $table) {
            $table->date('date_of_vaccination')->nullable()->after('diluent_lot_number');
            $table->date('next_vaccination')->nullable()->after('date_of_vaccination');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dosages', function (Blueprint $table) {
            //
        });
    }
}
