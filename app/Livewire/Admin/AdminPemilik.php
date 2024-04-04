<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\User;
use App\Models\Pemilik;

class AdminPemilik extends Component
{
    use \Livewire\WithPagination;

    #[Rule('required')]
    public string $nama;

    #[Rule('required|email|unique')]
    public string $email;

    #[Rule('required|min:8')]
    public string $password;

    #[Rule('required')]
    public string $alamat;

    #[Rule('required')]
    public string $nohp;

    #[Rule('required')]
    public string $role;

    public function render()
    {
        return view('livewire.admin.admin-pemilik');
    }
}
