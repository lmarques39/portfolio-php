<?php

use App\Models\Project;

beforeEach(function () {
    $this->withoutVite();
});

it('mostra a página inicial', function () {
    $this->get(route('home'))->assertOk();
});

it('lista só os projetos publicados', function () {
    Project::factory()->create(['title' => 'Habilux']);
    Project::factory()->create(['title' => 'Rascunho secreto', 'is_published' => false]);

    $this->get(route('projects.index'))
        ->assertOk()
        ->assertSee('Habilux')
        ->assertDontSee('Rascunho secreto');
});

it('mostra um projeto pelo slug', function () {
    $project = Project::factory()->create(['title' => 'Taysil', 'slug' => 'taysil']);

    $this->get('/projetos/taysil')
        ->assertOk()
        ->assertSee($project->title);
});

it('devolve 404 para projetos não publicados', function () {
    $project = Project::factory()->create(['is_published' => false]);

    $this->get(route('projects.show', $project))->assertNotFound();
});