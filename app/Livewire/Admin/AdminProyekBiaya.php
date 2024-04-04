<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Proyek;
use App\Models\Tugas_proyek;

class AdminProyekBiaya extends Component
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

    public function edit($id)
    {
        $biaya = Tugas_proyek::findOrFail($id);
        $this->biayaId = $id;
        $this->durasi = $biaya->durasi;
        $this->biaya_gaji = $biaya->biaya_gaji;
        $this->biaya_lain = $biaya->biaya_lain;
        $this->jml_biaya = $biaya->jml_biaya;

        $this->openModal();
    }

    public function update()
    {
        if ($this->biayaId) {
            $biaya = Tugas_proyek::findOrFail($this->biayaId);
            $biaya->update([
                'biaya_gaji' => $this->biaya_gaji,
                'biaya_lain' => $this->biaya_lain,
                'jml_biaya' => ($this->biaya_gaji+$this->biaya_lain)*$this->durasi,

            ]);
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->resetInput();
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
        return view('livewire.admin.admin-proyek-biaya',
        [
            'biayas' => $biayas,
        ]);
    }
}
