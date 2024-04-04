<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Tim;
use App\Models\Proyek;
use App\Models\User;
use Livewire\Attributes\Rule;

class AdminProyekTim extends Component
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

    public function store()
    {

        $tim = Tim::create([
            'proyek_id' => $this->proyekId,
            'user_id' => $this->userId,
            ]);

            session()->flash('Proyek created successfully', 'success');


            $this->closeModal();
        return $tim;
    }


    public function delete($id)
    {
        Proyek::find($this->proyekId)->user()->detach($id);
        session()->flash('success', 'Post deleted successfully.');

    }

    public function render()
    {
        /* Query Many to Many Menampilkan data tabel user join tabel proyek
        berdasarkan id proyek */
        $tims = Proyek::find($this->proyekId)->user()
        ->latest()
        ->paginate($this->limit);

        return view('livewire.admin.admin-proyek-tim',
        [
            'tims' => $tims,
        ]);
    }
}
