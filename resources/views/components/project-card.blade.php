@props(['project', 'headingLevel' => 2])

<article class="relative flex flex-col rounded-lg border border-line p-6 transition hover:shadow-md focus-within:ring-2 focus-within:ring-brand">
    <h{{ $headingLevel }} class="text-xl font-semibold">
        <a href="{{ route('projects.show', $project) }}" class="after:absolute after:inset-0 focus:outline-none">
            {{ $project->title }}
        </a>
    </h{{ $headingLevel }}>

    <p class="mt-2 text-muted">{{ $project->excerpt }}</p>

    @if ($project->stack)
        <ul class="mt-4 flex flex-wrap gap-2" aria-label="Tecnologias">
            @foreach ($project->stack as $tech)
                <x-tag>{{ $tech }}</x-tag>
            @endforeach
        </ul>
    @endif
</article>