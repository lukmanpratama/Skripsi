<?php

namespace App\Livewire\Pemilik;

use Livewire\Component;
use App\Models\Proyek;
use App\Models\Tugas_proyek;
use Livewire\Attributes\Rule;

class PemilikProyekTugas extends Component
{
    #[Rule('required|min:3')]
    public $nama_tugas;

    #[Rule('required|min:3')]
    public $deskripsi_tugas;

    public $progres_tugas;

    public $tahapan_tugas;

    public $status_tugas;

    public $tugasId;

    public $userId;

    public $tugasproyek;

    public $proyekId;

    use \Livewire\WithPagination;

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
        $this->tugasId = '';
        $this->nama_tugas = '';
        $this->deskripsi_tugas = '';
        $this->progres_tugas = '';
        $this->tahapan_tugas = '';
        $this->status_tugas = '';
    }
    public function mount($id)
    {
        //get post
        $proyek = Proyek::find($id);

        //assign
        $this->proyekId   = $proyek->id;
        if($proyek){
            $this->tugasproyek = $proyek;
        }
    }
    public function render()
    {
        $tugass = Tugas_proyek::where('proyek_id', $this->proyekId)
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_tugas', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.pemilik.pemilik-proyek-tugas',
        [
            'tugass' => $tugass,
        ]);
    }
}
