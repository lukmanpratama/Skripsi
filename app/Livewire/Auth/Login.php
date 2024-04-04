<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;



#[Title('Login')]
#[Layout('layouts.guest')]
class Login extends Component
{
    #[Rule('required', 'email')]
    public string $email ='';

    #[Rule('required')]
    public string $password ='';

    public function login()
    {
        if (Auth::attempt( $this->validate()))
        {
            if (auth()->user()->role == 'admin')
            {
                return redirect()->route('admin.beranda');
            }
            else if (auth()->user()->role == 'manajer')
            {
                return redirect()->route('manajer.beranda');
            }
            else if (auth()->user()->role == 'divisi')
            {
                return redirect()->route('divisi.beranda');
            }
            else if (auth()->user()->role == 'pemilik')
            {
               return redirect()->route('pemilik.beranda');
            }
            else
            {
                Auth::logout();
                return redirect()->route('auth.login')
                ->with('error','Email-Address And Password Are Wrong.');
            }
        }
    }
    public function render()
    {
        return view('livewire.auth.login');
    }
}
