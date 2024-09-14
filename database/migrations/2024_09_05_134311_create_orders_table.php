<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('tracking_no'); // Номер отслеживания
            $table->string('fullname');
            $table->string('phone');
            $table->string('Method_of_delivery');
            $table->string('Oblast');
            $table->string('number_viddilennya');
            $table->string('Method_of_payment');
            $table->string('status')->default('не виконано');
            $table->boolean('messagePost')->default(0);
            $table->string('email')->nullable();
            $table->string('payment')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
