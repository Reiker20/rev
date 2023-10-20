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
            $table->timestamps();
            $table->unsignedBigInteger('user_id');
            $table->string('pesanan_1');
            $table->integer('quantity_1');
            $table->string('pesanan_2')->nullable();
            $table->integer('quantity_2')->nullable();
            $table->string('pesanan_3')->nullable();
            $table->integer('quantity_3')->nullable();
            $table->string('pesanan_4')->nullable();
            $table->integer('quantity_4')->nullable();
            $table->string('pesanan_5')->nullable();
            $table->integer('quantity_5')->nullable();
            $table->decimal('total', 10, 2);
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
