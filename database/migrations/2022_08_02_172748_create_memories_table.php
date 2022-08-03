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
        Schema::create('memories', function (Blueprint $table) {
            $table->id();
            $table->string('image_175x51')->nullable();
            $table->string('image_494x702')->nullable();
            $table->string('item_name')->nullable();
            $table->string('preview')->nullable();
            $table->string('small_heading')->nullable();
            $table->string('big_heading')->nullable();
            $table->text('text')->nullable();
            $table->string('title')->nullable();
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
        Schema::dropIfExists('memories');
    }
};
