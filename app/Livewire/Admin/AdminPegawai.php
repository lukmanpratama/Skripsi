<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use App\Models\Pegawai;
use Livewire\Attributes\Rule;

class AdminPegawai extends Component
{
    use \Livewire\WithPagination;

    #[Rule('required')]
    public string $nama;

    #[Rule('required')]
    public string $email;

    #[Rule('required|min:8')]
    public string $password;

    #[Rule('required')]
    public string $alamat;

    #[Rule('required')]
    public string $nohp;

    #[Rule('required')]
    public string $role;

    #[Rule('required')]
    public string $deskripsi;

    #[Rule('required')]
    public string $jabatan;

    #[Rule('required')]
    public string $keahlian;

    public string $search='';

    public $isOpen = 0;

    public $pegawaiId;

    public int $limit = 10;

    public function create()
    {
        $this->openModal();
    }
    public function openModal()
    {
        $this->resetValidation();
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->resetInput();
        $this->isOpen = false;
    }

    public function resetInput()
    {
        $this->nama = '';
        $this->email = '';
        $this->password = '';
        $this->alamat = '';
        $this->nohp = '';
        $this->role = '';
        $this->deskripsi = '';
        $this->jabatan = '';
        $this->keahlian = '';
    }

    public function store()
    {
        $this->validate();

        $user = User::create([
            'name' => $this->nama,
            'email' => $this->email,
            'password' => bcrypt($this->password),
            'foto' => 'blank-profile-circle.png',
            'role' => $this->role,
            'jabatan'=> $this->jabatan,
        ]);
        $pegawai = Pegawai::create([
            'user_id' => $user->id,
            'deskripsi_pegawai'=> $this->deskripsi,

            'nohp_pegawai'=> $this->nohp,
            'keahlian'=> $this->keahlian,
            'alamat_pegawai'=> $this->alamat,

        ]);
        $pegawai->user();
        session()->flash('message', 'Data Berhasil Disimpan.');
        $this->closeModal();
        return $pegawai;
    }

    public function render()
    {
        $pegawais = User::has('pegawai')
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
                {
                    $search->where('name', 'like', '%'.$this->search.'%');
                }
            );

        }, fn ($search) => $search->latest())->paginate($this->limit);

        return view('livewire.admin.admin-pegawai',
        [
            'pegawais' => $pegawais,
        ]);
    }
}
