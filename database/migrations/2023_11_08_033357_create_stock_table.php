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
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->uuid('product_id')->unique()->index();
            $table->string('product_name');
            $table->integer('product_stock');
            $table->string('product_image')->nullable();
            $table->string('product_classification')->nullable();
            $table->string('product_status');
            $table->date('product_expiration')->format('d-m-Y')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stocks');
    }
};