<?php

namespace App\Livewire\Pemilik;

use Livewire\Component;
use App\Models\Proyek;

class PemilikProyekTim extends Component
{
    use \Livewire\WithPagination;

    public $timproyek;

    public $timId;

    public $userId;

    public $users;

    public $nama;

    public $foto;

    public $email;

    public $password;

    public $proyekId;

    public string $search='';

    public $isOpen = 0;

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
        $this->isOpen = false;
        $this->resetInput();
    }

    public function resetInput()
    {
        $this->timId = '';
        $this->nama = '';
        $this->email = '';
        $this->password = '';
    }
    public function mount($id)
    {
        //get post
        $proyek = Proyek::find($id);

        //assign
        $this->proyekId = $proyek->id;
        if($proyek){
            $this->timproyek = $proyek;
        }
    }

    public function render()
    {
        $tims = Proyek::find($this->proyekId)->user()
        ->latest()
        ->paginate($this->limit);
        return view('livewire.pemilik.pemilik-proyek-tim',
        [
            'tims' => $tims,
        ]);
    }
}
