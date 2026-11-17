@props(['title' => 'Portefólio'])

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Luís Marques</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-surface text-ink antialiased">
    
    <a href="#conteudo"
       class="sr-only focus:not-sr-only focus:fixed focus:top-4 focus:left-4 focus:z-50 focus:rounded focus:bg-ink focus:px-4 focus:py-2 focus:text-surface">
        Saltar para o conteúdo
    </a>

    <header class="border-b border-line">
        <nav aria-label="Principal" class="mx-auto flex max-w-4xl gap-6 px-4 py-4">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">Início</x-nav-link>
            <x-nav-link :href="route('projects.index')" :active="request()->routeIs('projects.*')">Projetos</x-nav-link>
        </nav>
    </header>

    <main id="conteudo" tabindex="-1" class="mx-auto max-w-4xl px-4 py-12">
        {{ $slot }}
    </main>

    <footer class="border-t border-line">
        <p class="mx-auto max-w-4xl px-4 py-6 text-sm text-muted">© {{ date('Y') }} Luís Marques</p>
    </footer>
</body>
</html>