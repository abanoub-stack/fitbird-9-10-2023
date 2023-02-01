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
        Schema::create('free_exercises', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->string('repeat_count')->nullable();
            $table->string('url')->nullable();
            $table->string('cat_name')->nullable();
            $table->string('time')->nullable();
            $table->string('calories')->nullable();
            $table->string('gif')->nullable();
            $table->boolean('is_deleted')->nullable();
            $table->string('deleted_at')->nullable();
            $table->integer('category_id')->nullable();

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
        Schema::dropIfExists('free_exercises');
    }
};
