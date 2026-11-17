<?php

use App\Filament\Resources\Projects\Pages\CreateProject;
use App\Models\Project;
use App\Models\User;
use Livewire\Livewire;

beforeEach(function () {
    config(['app.admin_email' => 'admin@example.com']);
});

it('bloqueia visitantes sem sessão', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

it('bloqueia utilizadores que não são o admin', function () {
    $user = User::factory()->create(['email' => 'outra@example.com']);

    $this->actingAs($user)->get('/admin')->assertForbidden();
});

it('deixa o admin criar um projeto', function () {
    $admin = User::factory()->create(['email' => 'admin@example.com']);
    $this->actingAs($admin);

    Livewire::test(CreateProject::class)
        ->fillForm([
            'title' => 'Habilux',
            'slug' => 'habilux',
            'excerpt' => 'Site para uma imobiliária.',
            'stack' => ['Next.js', 'Sanity'],
            'is_published' => true,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    expect(Project::where('slug', 'habilux')->exists())->toBeTrue();
});
