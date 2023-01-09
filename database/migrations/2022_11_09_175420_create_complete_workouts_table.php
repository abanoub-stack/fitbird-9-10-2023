<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complete_workouts', function (Blueprint $table) {
            $table->id();
            $table->string('workout_name')->nullable();
            $table->string('current_time')->nullable();
            $table->string('total_time')->nullable();
            $table->string('calories')->nullable();
            $table->string('todays_date')->nullable();
            $table->string('day')->nullable();
            $table->string('month')->nullable();
            $table->string('total_exercise')->nullable();
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
        Schema::dropIfExists('complete_workouts');
    }
};
