<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Pemilik;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Title('Login')]
#[Layout('layouts.guest')]
class RegistrasiPerorangan extends Component
{
    #[Rule('required|string')]
    public string $nama;

    #[Rule('required|email')]
    public string $email;

    #[Rule('required|min:8')]
    public string $password;

    #[Rule('required')]
    public string $profesi;

    #[Rule('required')]
    public string $alamat;

    #[Rule('required')]
    public string $nohp;

    public function registrasi()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'foto' => 'blank-profile-circle.png',
            'role' => 'pemilik',
            'jabatan' => 'pemilik proyek',

        ]);
        $pemilik = Pemilik::create([
            'user_id' => $user->id,
            'deskripsi_pemilik'=>'',
            'pekerjaan_pemilik'=> $this->profesi,
            'nama_instansi'=>'',
            'jenis_instansi'=>'',
            'alamat_instansi'=>'',
            'alamat_pemilik' => $this->alamat,
            'nohp_pemilik' => $this->nohp,
            'jenis_pemilik' => 'perorangan',

        ]);
        $pemilik->user();
        session()->flash('message', 'Data Berhasil Disimpan.');
        return redirect()->route('auth.login');
    }

    public function render()
    {
        return view('livewire.auth.registrasi-perorangan');
    }
}
