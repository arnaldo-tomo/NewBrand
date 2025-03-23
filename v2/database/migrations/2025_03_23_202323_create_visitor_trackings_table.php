<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_trackings', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->unique();
            $table->string('ip_address')->nullable();
            $table->string('location')->nullable();
            $table->string('isp')->nullable();
            $table->string('device_type')->nullable();
            $table->string('os_info')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->string('color_depth')->nullable();
            $table->string('pixel_ratio')->nullable();
            $table->string('device_memory')->nullable();
            $table->string('dark_mode')->nullable();
            $table->string('browser_info')->nullable();
            $table->string('browser_engine')->nullable();
            $table->string('browser_language')->nullable();
            $table->string('cookies_enabled')->nullable();
            $table->string('do_not_track')->nullable();
            $table->string('viewport_size')->nullable();
            $table->string('connection_type')->nullable();
            $table->string('connection_speed')->nullable();
            $table->string('page_load_time')->nullable();
            $table->string('network_latency')->nullable();
            $table->boolean('webgl_support')->default(false);
            $table->boolean('canvas_support')->default(false);
            $table->boolean('webrtc_support')->default(false);
            $table->boolean('webworker_support')->default(false);
            $table->boolean('geolocation_support')->default(false);
            $table->boolean('touch_support')->default(false);
            $table->boolean('notifications_support')->default(false);
            $table->boolean('webcam_support')->default(false);
            $table->string('battery_status')->nullable();
            $table->string('visit_time')->nullable();
            $table->string('page_url')->nullable();
            $table->string('referrer_url')->nullable();
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
        Schema::dropIfExists('visitor_trackings');
    }
}