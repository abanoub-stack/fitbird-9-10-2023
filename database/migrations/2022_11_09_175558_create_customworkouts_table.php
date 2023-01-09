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
        Schema::create('customworkouts', function (Blueprint $table) {
            $table->id();
            $table->string('categoty_id')->nullable();
            $table->string('category_name')->nullable();
            $table->string('name')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('time')->nullable();
            $table->string('calories')->nullable();
            $table->string('cycle')->nullable();
            $table->string('intervaltime')->nullable();
            $table->string('totalexercise')->nullable();
            $table->string('gif')->nullable();
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
        Schema::dropIfExists('customworkouts');
    }
};
