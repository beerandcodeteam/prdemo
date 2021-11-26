<?php

declare(strict_types=1);

namespace App\Http\Livewire;

use App\Models\Newsletter;
use Livewire\Component;

final class NewsletterForm extends Component
{
    public string $name = '';
    public string $email = '';

    /**
     * @var array<string, string>
     */
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required',
    ];

    /**
     * @var array<string, string>
     */
    protected $messages = [
        'required' => 'Pô, esqueceu de escrever o :attribute?',
        'min' => 'Aqui não paga por letra enviada! Manda no mínimo :min!',
    ];

    public function submit(): void
    {
        $validated = $this->validate();

        Newsletter::create($validated);

        $this->cleanFields();

        session()->flash('message', '😎 Valeu DEV! Você não vai se arrepender!');
    }

    public function render(): \Illuminate\View\View
    {
        return view('livewire.newsletter-form');
    }

    public function cleanFields(): void
    {
        $this->name = '';
        $this->email = '';
    }
}
