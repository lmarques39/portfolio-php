
<x-layout title="Início">
    <h1 class="text-4xl font-bold">Olá, eu sou o Luís!</h1>
    <p class="mt-4 text-lg text-muted">Programador web júnior: Laravel, React e acessibilidade.</p>

    <section aria-labelledby="destaques" class="mt-16">
        <h2 id="destaques" class="text-2xl font-bold">Projetos em destaque</h2>

        <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($featuredProjects as $project)
                <x-project-card :project="$project" />
            @endforeach
        </div>

        <a href="{{ route('projects.index') }}" class="mt-8 inline-block font-semibold text-brand underline underline-offset-4">
            Ver todos os projetos
        </a>
    </section>
</x-layout>