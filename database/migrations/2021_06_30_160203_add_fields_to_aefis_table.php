<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToAefisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('aefis', function (Blueprint $table) {
            $table->tinyInteger('has_adverse_event')->after('dose')->default(0);
            $table->string('adverse_event_condition')->after('has_adverse_event')->nullable();
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
