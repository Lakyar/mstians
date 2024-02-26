<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('education');
            $table->integer('level')->nullable();
            $table->integer('batch');
            $table->string('city');
            $table->string('course')->nullable();
            $table->string('images')->nullable();
            $table->string('timetable')->nullable();
            $table->string('exam_results')->nullable();
            $table->string('assignments')->nullable();
            $table->longText('announcements')->nullable();
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
        Schema::dropIfExists('classrooms');
    }
}
