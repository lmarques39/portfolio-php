
<x-layout title="Projetos">
    <h1 class="text-4xl font-bold">Projetos</h1>

    <div class="mt-8 grid gap-6 sm:grid-cols-2">
        @forelse ($projects as $project)
            <x-project-card :project="$project" />
        @empty
            <p>Ainda não há projetos publicados.</p>
        @endforelse
    </div>
</x-layout>

