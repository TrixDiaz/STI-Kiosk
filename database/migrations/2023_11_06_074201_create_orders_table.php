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
            $table->string('order_id')->nullable();
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('quantity');
            $table->decimal('total', 10, 2)->nullable();
            $table->string('order_type')->nullable();
            $table->string('product_category')->nullable();
            $table->string('payment_status')->nullable();
            $table->string('product_status')->nullable();
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
