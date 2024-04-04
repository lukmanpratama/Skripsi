<?php

namespace App\Livewire\Pemilik;

use Livewire\Component;
use App\Models\Proyek;
use App\Models\Tugas_proyek;

class PemilikProyekBiaya extends Component
{
    use \Livewire\WithPagination;

    public $biayaproyek;

    public $biayaId;

    public $durasi;

    public $biaya_gaji;

    public $biaya_lain;

    public $jml_biaya;

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
        $this->biayaId = '';
        $this->biaya_gaji = '';
        $this->biaya_lain = '';
    }
    public function mount($id)
    {
        //get post
        $proyek = Proyek::find($id);

        //assign
        $this->proyekId   = $proyek->id;
        if($proyek){
            $this->biayaproyek = $proyek;
        }
    }

    public function render()
    {
        $biayas =  Tugas_proyek::where('proyek_id', $this->proyekId)
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_tugas', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.pemilik.pemilik-proyek-biaya',
        [
            'biayas' => $biayas,
        ]);
    }
}
