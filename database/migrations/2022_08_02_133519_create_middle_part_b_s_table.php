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
        Schema::create('middle_part_b_s', function (Blueprint $table) {
            $table->id();
            $table->string('item_name')->nullable();
            $table->string('preview')->nullable();
            $table->string('image_heading')->nullable();
            $table->string('image_text')->nullable();
            $table->string('video_link')->nullable();
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
        Schema::dropIfExists('middle_part_b_s');
    }
};
