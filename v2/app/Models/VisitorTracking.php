<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorTracking extends Model
{
    use HasFactory;

    /**
     * Os atributos que são atribuíveis em massa.
     *
     * @var array
     */
    protected $fillable = [
        'session_id',
        'ip_address',
        'location',
        'isp',
        'device_type',
        'os_info',
        'screen_resolution',
        'color_depth',
        'pixel_ratio',
        'device_memory',
        'dark_mode',
        'browser_info',
        'browser_engine',
        'browser_language',
        'cookies_enabled',
        'do_not_track',
        'viewport_size',
        'connection_type',
        'connection_speed',
        'page_load_time',
        'network_latency',
        'webgl_support',
        'canvas_support',
        'webrtc_support',
        'webworker_support',
        'geolocation_support',
        'touch_support',
        'notifications_support',
        'webcam_support',
        'battery_status',
        'visit_time',
        'page_url',
        'referrer_url',
    ];

    /**
     * Os atributos que devem ser convertidos para tipos nativos.
     *
     * @var array
     */
    protected $casts = [
        'webgl_support' => 'boolean',
        'canvas_support' => 'boolean',
        'webrtc_support' => 'boolean',
        'webworker_support' => 'boolean',
        'geolocation_support' => 'boolean',
        'touch_support' => 'boolean',
        'notifications_support' => 'boolean',
        'webcam_support' => 'boolean',
    ];
}