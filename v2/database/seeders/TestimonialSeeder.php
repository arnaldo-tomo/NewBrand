<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Testimonial::create([
            'name' => 'Gerson Amálio Houane',
            'title' => 'Software Engineer - Cornelder de Moçambique',
            'content' => 'Trabalhar com o Arnaldo foi uma experiência incrível. Sua dedicação e conhecimento técnico são impressionantes.',
            'avatar' => 'https://media.licdn.com/dms/image/v2/D4D03AQFarGoIpyW2nQ/profile-displayphoto-shrink_800_800/B4DZbKKkBVGUAc-/0/1747148491467?e=1758153600&v=beta&t=KQyCkDYz1qunMgawvAXDyJrPH7yyY10y3l4SDxc39yE',
            'linkedin_url' => 'https://www.linkedin.com/in/gerson-amalio-houane/',
            'order' => 0,
        ]);

        \App\Models\Testimonial::create([
            'name' => 'Helio Jacinto Macarrala',
            'title' => 'ERP & Digital Transformation Consultant | Partner 2Business, SA',
            'content' => 'O Arnaldo demonstra um profissionalismo exemplar. Seus projetos são entregues com qualidade e atenção aos detalhes.',
            'avatar' => 'https://media.licdn.com/dms/image/v2/D4D03AQGQari0cEHEeQ/profile-displayphoto-crop_800_800/B4DZgE18JgHwAM-/0/1752427906148?e=1758153600&v=beta&t=2w10tmS257kJTNST86Y1PvFQ9ForirWqNPKBbOfPLVk',
            'linkedin_url' => 'https://www.linkedin.com/in/hjacintomz/',
            'order' => 1,
        ]);

        \App\Models\Testimonial::create([
            'name' => 'Md Mohi Minul Islam Yash',
            'title' => 'Certified Full Stack Developer | Specializing in NestJS, Next.js, Vue.js',
            'content' => 'Highly skilled developer with a great eye for design and user experience. It was a pleasure collaborating with him.',
            'avatar' => 'https://media.licdn.com/dms/image/v2/D5635AQFnoGbhNd1xHQ/profile-framedphoto-shrink_800_800/B56ZbKq599H0Ag-/0/1747156968007?e=1755990000&v=beta&t=IghgiZCzdyTcuOHO9jsUZJ8B1Id3Ey0u4gYgTfvumF4',
            'linkedin_url' => 'https://www.linkedin.com/in/yash-solo/',
            'order' => 2,
        ]);
    }
}
