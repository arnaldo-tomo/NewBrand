<?php

namespace App\Http\Controllers;

use App\Models\VisitorTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class VisitorTrackingController extends Controller
{
    /**
     * Salva ou atualiza os dados do visitante.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // Verificar se já existe um registro com esta sessão
            $visitor = VisitorTracking::firstOrNew(['session_id' => $request->session()->getId()]);

            // Atualizar ou preencher os dados do visitante
            $visitor->fill([
                'ip_address' => $request->ip(),
                'location' => $request->input('location'),
                'isp' => $request->input('isp'),
                'device_type' => $request->input('device_type'),
                'os_info' => $request->input('os_info'),
                'screen_resolution' => $request->input('screen_resolution'),
                'color_depth' => $request->input('color_depth'),
                'pixel_ratio' => $request->input('pixel_ratio'),
                'device_memory' => $request->input('device_memory'),
                'dark_mode' => $request->input('dark_mode'),
                'browser_info' => $request->input('browser_info'),
                'browser_engine' => $request->input('browser_engine'),
                'browser_language' => $request->input('browser_language'),
                'cookies_enabled' => $request->input('cookies_enabled'),
                'do_not_track' => $request->input('do_not_track'),
                'viewport_size' => $request->input('viewport_size'),
                'connection_type' => $request->input('connection_type'),
                'connection_speed' => $request->input('connection_speed'),
                'page_load_time' => $request->input('page_load_time'),
                'network_latency' => $request->input('network_latency'),
                'webgl_support' => $request->input('webgl_support', false),
                'canvas_support' => $request->input('canvas_support', false),
                'webrtc_support' => $request->input('webrtc_support', false),
                'webworker_support' => $request->input('webworker_support', false),
                'geolocation_support' => $request->input('geolocation_support', false),
                'touch_support' => $request->input('touch_support', false),
                'notifications_support' => $request->input('notifications_support', false),
                'webcam_support' => $request->input('webcam_support', false),
                'battery_status' => $request->input('battery_status'),
                'visit_time' => now()->format('Y-m-d H:i:s'),
                'page_url' => $request->input('page_url', $request->fullUrl()),
                'referrer_url' => $request->input('referrer_url', $request->header('referer')),
            ]);

            $visitor->save();

            return response()->json(['success' => true, 'message' => 'Dados do visitante salvos com sucesso']);
        } catch (\Exception $e) {
            Log::error('Erro ao salvar dados do visitante: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Erro ao salvar dados do visitante'], 500);
        }
    }
}