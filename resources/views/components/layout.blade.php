@props(['title' => 'Portefólio'])

<!DOCTYPE html>
<html lang="pt-PT">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} · Luís Marques</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white text-gray-900 antialiased">
    <header class="border-b">
        <nav aria-label="Principal" class="mx-auto flex max-w-4xl gap-6 px-4 py-4">
            <a href="{{ route('home') }}">Início</a>
        </nav>
    </header>

    <main id="conteudo" class="mx-auto max-w-4xl px-4 py-12">
        {{ $slot }}
    </main>
</body>
</html>