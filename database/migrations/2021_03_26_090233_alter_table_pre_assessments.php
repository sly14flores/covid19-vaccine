<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTablePreAssessments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pre_assessments', function (Blueprint $table) {
            $table->longText('assessments')->nullable()->change();
            $table->tinyInteger('consent')->nullable()->after('qr_pass_id');
            $table->string('reason')->nullable()->after('consent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pre_assessments', function (Blueprint $table) {
            //
        });
    }
}
