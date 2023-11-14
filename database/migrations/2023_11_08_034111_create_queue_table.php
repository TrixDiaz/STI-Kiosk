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
        Schema::create('queues', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('product_name');
            $table->integer('product_price');
            $table->integer('quantity');
            $table->decimal('total', 10, 2);
            $table->string('name');
            $table->string('order_type');
            $table->string('payment_status');
            $table->string('product_status')->default('Preparing');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('queues');
    }
};
