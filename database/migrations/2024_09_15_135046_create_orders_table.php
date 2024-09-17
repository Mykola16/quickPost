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
            $table->string('tracking_no');
            $table->string('fullname');
            $table->string('phone');
            $table->integer('price');
            $table->string('Method_of_delivery');
            $table->string('Oblast');
            $table->string('number_viddilennya');
            $table->string('Method_of_payment');
            $table->integer('quantity')->default(1);
            $table->string('status')->default('не виконано');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('product_id');
            $table->boolean('messagePost')->default(0); //Надіслати звіт на пошту ТАК/НІ
            $table->string('email')->nullable();
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
