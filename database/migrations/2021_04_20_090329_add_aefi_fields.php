<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAefiFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aefis', function (Blueprint $table) {
            $table->string('qr_pass_id')->nullable()->after('dosage_id');
            $table->integer('dose')->nullable()->after('qr_pass_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aefis', function (Blueprint $table) {
            //
        });
    }
}
