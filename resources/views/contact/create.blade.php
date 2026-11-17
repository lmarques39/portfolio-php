<x-layout title="Contacto">
    <h1 class="text-4xl font-bold">Contacto</h1>

    @if (session('status'))
        <p role="status" class="mt-6 rounded border border-green-700 bg-green-50 p-4 text-green-800">
            {{ session('status') }}
        </p>
    @endif

    @if ($errors->any())
        <div role="alert" class="mt-6 rounded border border-red-700 bg-red-50 p-4 text-red-800">
            Corrige os {{ $errors->count() }} erros assinalados abaixo.
        </div>
    @endif

    <form method="POST" action="{{ route('contact.store') }}" class="mt-8 max-w-xl space-y-6" novalidate>
        @csrf

        <x-form-field name="name" label="Nome" autocomplete="name" required />
        <x-form-field name="email" label="Email" type="email" autocomplete="email" required />
        <x-form-field name="message" label="Mensagem" type="textarea" required />

        <button type="submit" class="rounded bg-brand px-5 py-3 font-semibold text-white hover:bg-brand-dark">
            Enviar mensagem
        </button>
    </form>
</x-layout>