<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DosagesMoreFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dosages', function (Blueprint $table) {
            $table->string('diluent')->nullable()->after('dose');
            $table->date('date_of_reconstitution')->nullable()->after('diluent');
            $table->time('time_of_reconstitution')->nullable()->after('date_of_reconstitution');
            $table->integer('diluent_batch_number')->nullable()->after('time_of_reconstitution');
            $table->integer('diluent_lot_number')->nullable()->after('diluent_batch_number');
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
