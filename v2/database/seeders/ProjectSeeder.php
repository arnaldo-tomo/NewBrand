<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Projeto Fibec Taxi
        Project::create([
            'title' => 'Fibec Taxi',
            'slug' => 'fibec-taxi',
            'description' => 'Um aplicativo móvel para serviços de táxi em Moçambique, conectando passageiros a motoristas próximos de forma rápida e segura.',
            'image' => null, // Você precisará importar as imagens manualmente
            'playstore_link' => 'https://play.google.com/store/apps/details?id=com.fibec.customer&hl=pt_PT',
            'appstore_link' => 'https://apps.apple.com/us/app/fibec-taxi/id6450050623?l=pt-BR',
            'features' => [
                'Solicitação de corridas em tempo real',
                'Rastreamento do motorista no mapa',
                'Várias opções de pagamento',
                'Avaliação de motoristas'
            ],
            'order' => 0,
            'is_active' => true,
        ]);

        // Projeto Meu Tako
        Project::create([
            'title' => 'Meu Tako',
            'slug' => 'meu-tako',
            'description' => 'Aplicativo de gestão financeira pessoal que permite aos usuários controlar suas despesas e receitas de forma simples e eficaz.',
            'image' => null,
            'playstore_link' => 'https://play.google.com/apps/internaltest/4701412020376274157',
            'appstore_link' => null,
            'features' => [
                'Controle de despesas e receitas',
                'Categorização de transações',
                'Relatórios financeiros detalhados',
                'Lembretes de pagamento',
                'Metas de economia',
                'Sincronização entre dispositivos'
            ],
            'order' => 1,
            'is_active' => true,
        ]);

        // Projeto Reflexões
        Project::create([
            'title' => 'Reflexões',
            'slug' => 'reflexoes',
            'description' => 'Um aplicativo que oferece reflexões diárias, mensagens motivacionais e citações inspiradoras para ajudar os usuários em seu desenvolvimento pessoal.',
            'image' => null,
            'playstore_link' => 'https://play.google.com/store/apps/details?id=com.arnaldotomo.reflexoes',
            'appstore_link' => null,
            'features' => [
                'Reflexões diárias',
                'Notificações personalizáveis',
                'Compartilhamento nas redes sociais',
                'Favoritos e coleções',
                'Temas inspiradores',
                'Modo offline'
            ],
            'order' => 2,
            'is_active' => true,
        ]);
    }
}