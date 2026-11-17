<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMessage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function create(): View
    {
        return view('contact.create');
    }

    public function store(StoreContactRequest $request): RedirectResponse
    {
        $data = $request->validated();

        Mail::to(config('mail.from.address'))->send(
            new ContactMessage($data['name'], $data['email'], $data['message'])
        );

        return redirect()
            ->route('contact.create')
            ->with('status', 'Obrigado! A tua mensagem foi enviada.');
    }
}