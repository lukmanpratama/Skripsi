<?php

namespace App\Livewire\Guest;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]
class Beranda extends Component
{
    public function render()
    {
        return view('livewire.guest.beranda');
    }
}
