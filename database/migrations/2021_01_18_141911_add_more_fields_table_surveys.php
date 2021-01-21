<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoreFieldsTableSurveys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surveys', function (Blueprint $table) {
            $table->string('yes_vaccine')->after('not_sure_pregnant_baby')->nullable()->comment('Are you willing to be vaccinated with any available Covid-19 vaccine?');
            $table->string('no_vaccine')->after('yes_vaccine')->nullable()->comment('Are you willing to be vaccinated with any available Covid-19 vaccine?');
            $table->string('yes_contribute')->after('no_vaccine')->nullable()->comment('Are you willing to contribute to the vaccination fee?');
            $table->string('no_contribute')->after('yes_contribute')->nullable()->comment('Are you willing to contribute to the vaccination fee?');
            $table->string('efficacy_rate_reason')->after('no_contribute')->nullable()->comment('Why? State reasons');
            $table->string('vaccine_cost_reason')->after('efficacy_rate_reason')->nullable()->comment('Why? State reasons');
            $table->string('side_effects_reason')->after('vaccine_cost_reason')->nullable()->comment('Why? State reasons');
            $table->string('lack_of_information_reason')->after('side_effects_reason')->nullable()->comment('Why? State reasons');
            $table->string('others_reason')->after('lack_of_information_reason')->nullable()->comment('Why? State reasons');
            $table->string('one_hundred_percent_fee')->after('others_reason')->nullable()->comment('How much are you willing to pay for the vaccine fee?');
            $table->string('seventy_five_percent_fee')->after('one_hundred_percent_fee')->nullable()->comment('How much are you willing to pay for the vaccine fee?');
            $table->string('fifty_percent_fee')->after('seventy_five_percent_fee')->nullable()->comment('How much are you willing to pay for the vaccine fee?');
            $table->string('twenty_five_percent_fee')->after('fifty_percent_fee')->nullable()->comment('How much are you willing to pay for the vaccine fee?');
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
