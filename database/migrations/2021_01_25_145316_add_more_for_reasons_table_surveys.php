<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreForReasonsTableSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->tinyInteger('safety_reason')->nullable()->after('efficacy_rate_reason');
            $table->tinyInteger('presence_reason')->nullable()->after('safety_reason');
            $table->tinyInteger('brand_reason')->nullable()->after('presence_reason');
            $table->tinyInteger('pregnant_reason')->nullable()->after('brand_reason');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surveys', function (Blueprint $table) {
            //
        });
    }
}
