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
        Schema::create('customer_subscribtion', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id')->nullable();
            $table->integer('customer_stripe_charge_id')->nullable();
            $table->integer('stripe_customer_id')->nullable();
            $table->enum('duration', ['day', 'week', 'month', 'year'])->default('month');
            $table->enum('approviation_status', ['pending', 'accepted', 'canceled', 'finished'])->default('pending');
            $table->string('started_at')->nullable();
            $table->string('finishes_at')->nullable();
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
        Schema::dropIfExists('customer_subscribtion');
    }
};
