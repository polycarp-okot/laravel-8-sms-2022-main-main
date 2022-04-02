<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_routings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('level_id')->nullable();
            $table->foreignId('grade_id')->nullable();
            $table->foreignId('class_id')->nullable();
            $table->foreignId('subject_id')->nullable();
            $table->foreignId('session_id')->nullable();
            $table->foreignId('day_id')->nullable();
            $table->foreignId('shift_id')->nullable();
            $table->foreignId('time_id')->nullable();
            $table->foreignId('section_id')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('class_routings');
    }
}
