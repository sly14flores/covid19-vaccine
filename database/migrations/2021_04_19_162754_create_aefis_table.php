<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAefisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aefis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dosage_id')->constrained('dosages')->nullable()
            ->onDelete('cascade')
            ->onUpdate('no action');
            $table->longText('adverse_events')->nullable();  // serialize_array
            $table->string('others')->nullable();
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->tinyInteger('is_serious')->default(0);
            $table->longText('serious')->nullable();  // serialize_array
            $table->string('other_serious')->nullable();
            $table->string('current_status')->nullable(); // serialize_array
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aefis');
    }
}
