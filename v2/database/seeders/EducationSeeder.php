<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            [
                'title' => 'Universidade Católica de Moçambique',
                'period' => '2019 - 2023',
                'description' => 'Licenciatura em Engenharia Informática com especialização em desenvolvimento de software, sistemas de informação e redes de computadores.',
                'logo' => 'images/ucm.jpg',
                'order' => 1,
            ],
            [
                'title' => 'Python Essentials',
                'period' => '2023 - 2023',
                'description' => 'Python Essentials 1 & 2 pela Cisco Networking Academy, abrangendo fundamentos de programação Python, estruturas de dados e desenvolvimento de aplicações.',
                'logo' => 'images/phy1.png',
                'order' => 2,
            ],
            [
                'title' => 'Cyber Threat Management',
                'period' => '2025',
                'description' => 'Gestão de ameaças cibernéticas, análise de riscos, estratégias de mitigação e resposta a incidentes em ambientes digitais.',
                'logo' => 'images/cyber.png',
                'order' => 3,
            ],
            [
                'title' => 'Introduction to Data Science',
                'period' => '2025',
                'description' => 'Fundamentos de ciência de dados, análise estatística, visualização de dados e introdução a técnicas de machine learning para extrair insights valiosos.',
                'logo' => 'images/data.png',
                'order' => 4,
            ],
            [
                'title' => 'Endpoint Security',
                'period' => '2014',
                'description' => 'Segurança de endpoints, proteção contra malware, firewall pessoal e controle de dispositivos para garantir a integridade dos sistemas finais.',
                'logo' => 'images/EndpointSecurity.png',
                'order' => 5,
            ],
            [
                'title' => 'Ethical Hacker',
                'period' => '2025',
                'description' => 'Técnicas de hacking ético, identificação de vulnerabilidades, testes de penetração e métodos de defesa de sistemas contra intrusões maliciosas.',
                'logo' => 'images/hacher.png',
                'order' => 6,
            ],
            [
                'title' => 'Introdução à Cibersegurança',
                'period' => '2025',
                'description' => 'Conceitos fundamentais de segurança cibernética, proteção de dados pessoais, ameaças online comuns e práticas recomendadas de segurança digital.',
                'logo' => 'images/I2CS__1_.png',
                'order' => 7,
            ],
            [
                'title' => 'Introduction to IoT',
                'period' => '2019',
                'description' => 'Fundamentos da Internet das Coisas (IoT), conectividade de dispositivos, coleta de dados em tempo real e aplicações práticas em ambientes inteligentes.',
                'logo' => 'images/Intro2IoT.png',
                'order' => 8,
            ],
            [
                'title' => 'JavaScript Essentials',
                'period' => '2025',
                'description' => 'Fundamentos de programação JavaScript, manipulação do DOM, eventos e desenvolvimento de lógica para aplicações web interativas.',
                'logo' => 'images/js1.png',
                'order' => 9,
            ],
            [
                'title' => 'Introduction to Serverless Development',
                'period' => 'Maio 2025',
                'description' => 'Fundamentos de desenvolvimento serverless, arquitetura sem servidor e melhores práticas para criar aplicações escaláveis na nuvem AWS.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg',
                'order' => 10,
            ],
            [
                'title' => 'AWS Lambda Foundations',
                'period' => 'Maio 2025',
                'description' => 'Fundamentos do AWS Lambda, computação serverless, triggers de eventos e desenvolvimento de funções cloud-native.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg',
                'order' => 11,
            ],
            [
                'title' => 'Amazon EC2 Basics',
                'period' => 'Maio 2025',
                'description' => 'Fundamentos do Amazon EC2, criação e gestão de instâncias, configuração de segurança e melhores práticas para computação na nuvem.',
                'logo' => 'https://upload.wikimedia.org/wikipedia/commons/9/93/Amazon_Web_Services_Logo.svg',
                'order' => 12,
            ]
        ];

        foreach ($items as $item) {
            \App\Models\Education::create($item);
        }
    }
}
