<?php

namespace App\Http\Controllers;

use App\Models\VisitorTracking;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class VisitorDashboardController extends Controller
{
    /**
     * Mostra o dashboard de rastreamento de visitantes
     */
    public function dashboard()
    {
        // Estatísticas gerais
        $totalVisitantes = VisitorTracking::count();
        $visitantesHoje = VisitorTracking::whereDate('created_at', Carbon::today())->count();
        $visitantesOntem = VisitorTracking::whereDate('created_at', Carbon::yesterday())->count();
        $visitantesEstaSemana = VisitorTracking::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();

        // Dados para gráfico de visitantes por dia (últimos 30 dias)
        $visitantesPorDia = VisitorTracking::select(
                DB::raw('DATE(created_at) as data'),
                DB::raw('count(*) as total')
            )
            ->whereDate('created_at', '>=', Carbon::now()->subDays(30))
            ->groupBy('data')
            ->orderBy('data')
            ->get();

        // Estatísticas de dispositivos
        $dispositivosPorTipo = VisitorTracking::select('device_type', DB::raw('count(*) as total'))
            ->groupBy('device_type')
            ->orderByDesc('total')
            ->get();

        // Estatísticas de navegadores
        $navegadores = VisitorTracking::select(
                DB::raw('SUBSTRING_INDEX(browser_info, " ", 1) as browser'),
                DB::raw('count(*) as total')
            )
            ->groupBy('browser')
            ->orderByDesc('total')
            ->get();

        // Estatísticas de sistema operacional
        $sistemaOperacional = VisitorTracking::select(
                DB::raw('SUBSTRING_INDEX(os_info, " ", 1) as os'),
                DB::raw('count(*) as total')
            )
            ->groupBy('os')
            ->orderByDesc('total')
            ->get();

        // Estatísticas de resolução de tela
        $resolucoes = VisitorTracking::select('screen_resolution', DB::raw('count(*) as total'))
            ->groupBy('screen_resolution')
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        // Estatísticas de idiomas
        $idiomas = VisitorTracking::select('browser_language', DB::raw('count(*) as total'))
            ->groupBy('browser_language')
            ->orderByDesc('total')
            ->get();

        // Localizações dos visitantes
        $localizacoes = VisitorTracking::select('location', DB::raw('count(*) as total'))
            ->groupBy('location')
            ->orderByDesc('total')
            ->limit(15)
            ->get();

        // Estatísticas de recursos do navegador
        $recursosNavegador = [
            'WebGL' => VisitorTracking::where('webgl_support', true)->count(),
            'Canvas' => VisitorTracking::where('canvas_support', true)->count(),
            'WebRTC' => VisitorTracking::where('webrtc_support', true)->count(),
            'Web Workers' => VisitorTracking::where('webworker_support', true)->count(),
            'Geolocalização' => VisitorTracking::where('geolocation_support', true)->count(),
            'Touch' => VisitorTracking::where('touch_support', true)->count(),
            'Notificações' => VisitorTracking::where('notifications_support', true)->count(),
            'Webcam' => VisitorTracking::where('webcam_support', true)->count(),
        ];

        // Estatísticas de conexão
        $tiposConexao = VisitorTracking::select('connection_type', DB::raw('count(*) as total'))
            ->groupBy('connection_type')
            ->orderByDesc('total')
            ->get();

        // Velocidades de conexão médias
        $velocidadesConexao = VisitorTracking::select('connection_speed')
            ->whereNotNull('connection_speed')
            ->get()
            ->map(function ($item) {
                // Extrair apenas o número da string (ex: "10.5 Mbps" -> 10.5)
                preg_match('/([0-9.]+)/', $item->connection_speed, $matches);
                return isset($matches[1]) ? (float) $matches[1] : null;
            })
            ->filter()
            ->avg();

        // Últimos visitantes
        $ultimosVisitantes = VisitorTracking::orderByDesc('created_at')
            ->limit(10)
            ->get();

        // Visitantes por hora do dia
        $visitantesPorHora = VisitorTracking::select(
                DB::raw('HOUR(created_at) as hora'),
                DB::raw('count(*) as total')
            )
            ->groupBy('hora')
            ->orderBy('hora')
            ->get();

        return view('dashboard', compact(
            'totalVisitantes',
            'visitantesHoje',
            'visitantesOntem',
            'visitantesEstaSemana',
            'visitantesPorDia',
            'dispositivosPorTipo',
            'navegadores',
            'sistemaOperacional',
            'resolucoes',
            'idiomas',
            'localizacoes',
            'recursosNavegador',
            'tiposConexao',
            'velocidadesConexao',
            'ultimosVisitantes',
            'visitantesPorHora'
        ));
    }

}