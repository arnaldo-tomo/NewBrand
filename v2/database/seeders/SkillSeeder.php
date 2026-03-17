<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            // Backend
            ['name' => 'Laravel', 'category' => 'backend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/laravel-2.svg', 'proficiency' => 5],
            ['name' => 'MySQL', 'category' => 'backend', 'icon' => 'images/mysql.png', 'proficiency' => 4],
            ['name' => 'Node.js', 'category' => 'backend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/nodejs-icon.svg', 'proficiency' => 3],
            ['name' => 'Python', 'category' => 'backend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/python-5.svg', 'proficiency' => 2],

            // Frontend
            ['name' => 'Vue.js', 'category' => 'frontend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/vue-9.svg', 'proficiency' => 5],
            ['name' => 'React', 'category' => 'frontend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/react-2.svg', 'proficiency' => 4],
            ['name' => 'Tailwind', 'category' => 'frontend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/tailwindcss.svg', 'proficiency' => 5],
            ['name' => 'HTML5/CSS3', 'category' => 'frontend', 'icon' => 'https://cdn.worldvectorlogo.com/logos/html5-2.svg', 'proficiency' => 5],

            // Mobile
            ['name' => 'React Native', 'category' => 'mobile', 'icon' => 'https://cdn.worldvectorlogo.com/logos/react-native-1.svg', 'proficiency' => 5],
            ['name' => 'Flutter', 'category' => 'mobile', 'icon' => 'https://cdn.worldvectorlogo.com/logos/flutter.svg', 'proficiency' => 4],
            ['name' => 'Swift', 'category' => 'mobile', 'icon' => 'https://cdn.worldvectorlogo.com/logos/swift-15.svg', 'proficiency' => 3],
            ['name' => 'Java/Kotlin', 'category' => 'mobile', 'icon' => 'https://cdn.worldvectorlogo.com/logos/kotlin-1.svg', 'proficiency' => 3],

            // Design & DevOps
            ['name' => 'Figma', 'category' => 'design', 'icon' => 'https://cdn.worldvectorlogo.com/logos/figma-5.svg', 'proficiency' => 4],
            ['name' => 'Git/Github', 'category' => 'design', 'icon' => 'https://cdn.worldvectorlogo.com/logos/github-icon-1.svg', 'proficiency' => 5],
            ['name' => 'Docker', 'category' => 'design', 'icon' => 'https://cdn.worldvectorlogo.com/logos/docker.svg', 'proficiency' => 3],
            ['name' => 'AWS', 'category' => 'design', 'icon' => 'images/aws.png', 'proficiency' => 3],
        ];

        foreach ($skills as $index => $skill) {
            \App\Models\Skill::create(array_merge($skill, ['order' => $index]));
        }
    }
}
