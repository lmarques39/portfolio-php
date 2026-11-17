<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'Habilux',
                'slug' => 'habilux',
                'excerpt' => 'Site completo para uma imobiliária, com 137 imóveis geridos num CMS.',
                'body' => 'Listagens com filtros, ordenação e paginação sincronizados com o URL, página de imóvel com galeria e lightbox acessível por teclado, e formulário de contacto funcional.',
                'stack' => ['Next.js', 'React', 'TypeScript', 'Tailwind', 'Sanity'],
                'url' => 'https://habilux.vercel.app',
                'is_published' => true,
            ],
            [
                'title' => 'Taysil',
                'slug' => 'taysil',
                'excerpt' => 'Catálogo de produtos modernizado para um distribuidor B2B de peças auto.',
                'body' => 'Catálogo com pesquisa aproximada (fuzzy search), categorias e conteúdos geridos pelo cliente num CMS.',
                'stack' => ['React', 'Vite', 'TypeScript', 'Tailwind', 'Sanity'],
                'url' => 'https://taysil-demo.vercel.app',
                'is_published' => true,
            ],
            [
                'title' => 'Cuddly',
                'slug' => 'cuddly',
                'excerpt' => 'App para gravidez e pós-parto, pensada para ser usada com uma mão, a meio da noite.',
                'body' => 'Registo de contrações, amamentação, biberão e fraldas, offline. Projeto final do IEFP.',
                'stack' => ['React Native', 'Expo', 'TypeScript'],
                'url' => null,
                'is_published' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }
    }
}
