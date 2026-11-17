
<x-layout :title="$project->title">
    <a href="{{ route('projects.index') }}" class="text-sm text-brand underline underline-offset-4">← Todos os projetos</a>

    <h1 class="mt-4 text-4xl font-bold">{{ $project->title }}</h1>
    <p class="mt-4 text-lg text-muted">{{ $project->excerpt }}</p>

    @if ($project->image)
        <img src="{{ asset('storage/' . $project->image) }}"
             alt="{{ $project->image_alt ?? '' }}"
             class="mt-8 w-full rounded-lg">
    @endif

    @if ($project->stack)
        <h2 class="mt-8 text-xl font-semibold">Tecnologias</h2>
        <ul class="mt-3 flex flex-wrap gap-2">
            @foreach ($project->stack as $tech)
                <x-tag>{{ $tech }}</x-tag>
            @endforeach
        </ul>
    @endif

    @if ($project->body)
        <div class="mt-8 max-w-prose leading-relaxed">
            {{ $project->body }}
        </div>
    @endif

    @if ($project->url)
        <a href="{{ $project->url }}" class="mt-8 inline-block rounded bg-brand px-5 py-3 font-semibold text-white hover:bg-brand-dark">
            Ver o projeto online
        </a>
    @endif
</x-layout>