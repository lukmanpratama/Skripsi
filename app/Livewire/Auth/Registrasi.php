<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Login')]
#[Layout('layouts.guest')]
class Registrasi extends Component
{
    public function render()
    {
        return view('livewire.auth.registrasi');
    }
}
