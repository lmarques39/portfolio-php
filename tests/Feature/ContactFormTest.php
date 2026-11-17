<?php

use App\Mail\ContactMessage;
use Illuminate\Support\Facades\Mail;

beforeEach(function () {
    $this->withoutVite();
});

it('envia o email quando os dados são válidos', function () {
    Mail::fake();

    $this->post(route('contact.store'), [
        'name' => 'Ana',
        'email' => 'ana@example.com',
        'message' => 'Olá, gostei muito do teu portefólio!',
    ])
        ->assertRedirect(route('contact.create'))
        ->assertSessionHas('status');

    Mail::assertSent(ContactMessage::class);
});

it('rejeita dados inválidos', function () {
    Mail::fake();

    $this->post(route('contact.store'), [
        'name' => '',
        'email' => 'isto-nao-e-email',
        'message' => 'curta',
    ])->assertSessionHasErrors(['name', 'email', 'message']);

    Mail::assertNothingSent();
});
