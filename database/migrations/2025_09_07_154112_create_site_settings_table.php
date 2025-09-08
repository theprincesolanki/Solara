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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();

            // Site details
            $table->string('site_name')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('address')->nullable();

            // Contact persons (up to 3)
            $table->string('contact_name1')->nullable();
            $table->string('contact_phone1')->nullable();

            $table->string('contact_name2')->nullable();
            $table->string('contact_phone2')->nullable();

            $table->string('contact_name3')->nullable();
            $table->string('contact_phone3')->nullable();

            // Email persons (up to 3)
            $table->string('email_name1')->nullable();
            $table->string('email_address1')->nullable();

            $table->string('email_name2')->nullable();
            $table->string('email_address2')->nullable();

            $table->string('email_name3')->nullable();
            $table->string('email_address3')->nullable();

            // SMTP Settings
            $table->string('smtp_host')->nullable();
            $table->string('smtp_port')->nullable();
            $table->string('smtp_username')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('smtp_encryption')->nullable(); // ssl / tls
            $table->string('smtp_from_name')->nullable();
            $table->string('smtp_from_address')->nullable();

            // Common SEO fields
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->string('meta_author')->nullable();
            $table->string('meta_robots')->default('index, follow');

            // Social meta (for SEO)
            $table->string('og_title')->nullable();
            $table->text('og_description')->nullable();
            $table->string('og_image')->nullable();

            $table->string('twitter_title')->nullable();
            $table->text('twitter_description')->nullable();
            $table->string('twitter_image')->nullable();

            // Social Media Links
            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('whatsapp_number')->nullable();
            $table->string('telegram_url')->nullable();

            $table->string('map_embed')->nullable();

            $table->timestamps();
        });

        // Seed with 1 row (default settings)
        \DB::table('site_settings')->insert([
            'site_name' => 'Prince Enterprise',
            'meta_robots' => 'index, follow',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
