<?php

namespace App\Livewire\Pemilik;

use Livewire\Component;
use App\Models\Proyek;
use App\Models\Tugas_proyek;

class PemilikProyekWaktu extends Component
{
    use \Livewire\WithPagination;

    public $waktuproyek;

    public $waktuId;

    public $waktu_optimistik;

    public $waktu_pesimistik;

    public $waktu_realistik;

    public $durasi;

    public $tgl_mulai;

    public $tgl_selesai;

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
        $this->waktuId = '';
        $this->waktu_optimistik = '';
        $this->waktu_realistik = '';
        $this->waktu_pesimistik = '';
        $this->durasi= '';
        $this->tgl_mulai= '';
        $this->tgl_selesai= '';
    }

    public function mount($id)
    {
        //get post
        $proyek = Proyek::find($id);

        //assign
        $this->proyekId = $proyek->id;
        if($proyek){
            $this->waktuproyek = $proyek;
        }
    }

    public function render()
    {
        $waktus =  Tugas_proyek::where('proyek_id', $this->proyekId)
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_tugas', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.pemilik.pemilik-proyek-waktu',
        [
            'waktus' => $waktus,
        ]);
    }
}
