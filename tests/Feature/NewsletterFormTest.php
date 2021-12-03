<?php

declare(strict_types=1);

use App\Http\Livewire\NewsletterForm;
use App\Models\Newsletter;
use function Pest\Livewire\livewire;

it('renders the component')
    ->get('/')
    ->assertSeeLivewire('newsletter-form');

it('registers a new subscriber', function () {
    livewire(NewsletterForm::class)
        ->set('name', 'Virgão')
        ->set('email', 'virgu@front-end-masters.com')
        ->call('submit')
        ->assertSee('Valeu DEV! Você não vai se arrepender!');

    expect(Newsletter::first())
        ->name->toBe('Virgão')
        ->email->toBe('virgu@front-end-masters.com');
});

it('validates wrong inputs', function (array $input, string $message) {
    livewire(NewsletterForm::class)
        ->set('name', $input['name'])
        ->set('email', $input['email'])
        ->call('submit')
        ->assertSee($message);
})->with([
    [ ['name' => '', 'email' => ''], 'Pô, esqueceu de escrever o name'],
    [ ['name' => 'da', 'email' => ''], 'Aqui não paga por letra enviada! Manda no mínimo 3'],
    [ ['name' => 'virgão jobs', 'email' => ''], 'Pô, esqueceu de escrever o email'],
    [ ['name' => 'virgão jobs', 'email' => 'vig@'], 'Bebeu todas? Email é tipo voce@voce.com.br']
]);

    /*

]);
*/
