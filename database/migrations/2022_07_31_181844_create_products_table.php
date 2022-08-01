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
        Schema::create('products', function (Blueprint $table) 
        {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('category')->nullable();
            $table->string('product_name')->nullable();
            $table->string('tagname')->nullable();
            $table->string('prev_price')->nullable();
            $table->string('price')->nullable();
            $table->string('rating')->nullable();
            $table->text('description')->nullable();
            $table->string('weight')->nullable();
            $table->string('dimension')->nullable();
            $table->string('color')->nullable();
            $table->string('logo')->nullable();
            $table->string('image_1000')->nullable();
            $table->string('image_768')->nullable();
            $table->string('image_600')->nullable();
            $table->string('image_300')->nullable();
            $table->string('image_150')->nullable();
            $table->string('image_100')->nullable();
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
        Schema::dropIfExists('products');
    }
};
