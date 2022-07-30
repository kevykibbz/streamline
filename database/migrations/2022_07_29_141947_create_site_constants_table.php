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
        Schema::create('site_constants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default(env('SITE_DESIGNER', 'Kevin kibebe'));
            $table->string('site_name')->default(env('SITE_NAME', 'Laravel'));
            $table->string('email')->unique()->default(env('SITE_NAME', 'example@gmail.com'));
            $table->string('email_two')->nullable()->default(env('SITE_NAME', 'example@gmail.com'));
            $table->string('theme_color')->default(env('THEME_COLOR', '#000'));
            $table->string('site_url')->default(env('SITE_URL', 'example.com'));
            $table->text('site_descreption')->nullable()->default(env('SITE_DESCRIPTION', 'Sample description'));
            $table->text('site_keywords')->nullable()->default(env('SITE_KEYWORDS'));
            $table->string('site_address')->nullable()->default(env('SITE_ADDRESS'));
            $table->string('site_location')->nullable()->default(env('SITE_LOCATION'));
            $table->string('working_days')->nullable()->default('mon-fri');
            $table->string('working_hours')->nullable()->default('8am-10pm');
            $table->string('closed_days')->nullable()->default('sun');
            $table->string('special_days')->nullable()->default('sat & holidays');
            $table->string('special_hours')->nullable()->default('8am-12pm');
            $table->string('facebook')->nullable()->default(env('FACEBOOK_LINK'));
            $table->string('twitter')->nullable()->default(env('TWITTER_LINK'));
            $table->string('instagram')->nullable()->default(env('INSTAGRAM_LINK'));
            $table->string('whatsapp')->nullable()->default(env('WHATSAPP_LINK'));
            $table->string('linkedin')->nullable()->default(env('LINKEDIN_LINK'));
            $table->string('youtube')->nullable()->default(env('YOUTUBE_LINK'));
            $table->string('github')->nullable()->default(env('GITHUB_LINK'));
            $table->string('favicon')->nullable()->default(env('favicon.ico'));
            $table->string('icon_180')->nullable()->default(env('favicon_180.ico'));
            $table->string('icon_32')->nullable()->default(env('favicon_32.ico'));
            $table->string('icon_16')->nullable()->default(env('favicon_16.ico'));
            $table->string('phone')->unique()->default(env('SITE_PHONE1'));
            $table->string('phone_two')->unique()->default(env('SITE_PHONE2'));
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
        Schema::dropIfExists('site_constants');
    }
};
