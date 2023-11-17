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
        Schema::create('addons', function (Blueprint $table) {
            $table->id();
            $table->uuid('product_id')->unique()->index();
            $table->string('product_name');
            $table->integer('product_stock');
            $table->decimal("product_price", 6, 2); 
            $table->string('product_image')->nullable();
            $table->string('product_category');
            $table->string('product_status')->nullable();
            $table->date('product_expiration')->format('Y-m-d');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addons');
    }
};
