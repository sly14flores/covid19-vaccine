<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OthersFieldsTableSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->string('population_group_other')->after('others_population_group')->nullable()->comment('Population Group');
            $table->string('health_condition_other')->after('others_health_condition')->nullable()->comment('Health Condition');
            $table->string('reason_other')->after('others_reason')->nullable()->comment('Why? State reasons');
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
