<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVaccineFkTablePostAssessments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_assessments', function (Blueprint $table) {
            $table->unsignedBigInteger('vaccine_id')->nullable()->after('qr_pass_id');
            $table->foreign('vaccine_id')->references('id')->on('vaccines');
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
