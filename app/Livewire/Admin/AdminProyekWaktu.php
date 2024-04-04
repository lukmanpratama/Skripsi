<?php

namespace App\Livewire\Admin;

use App\Models\Proyek;
use App\Models\Tugas_proyek;
use App\Models\Tugas_waktu;
use Livewire\Component;

class AdminProyekWaktu extends Component
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

    public function edit($id)
    {
        $waktu = Tugas_proyek::findOrFail($id);
        $this->waktuId = $id;
        $this->waktu_optimistik = $waktu->waktu_optimistik;
        $this->waktu_realistik = $waktu->waktu_realistik;
        $this->waktu_pesimistik = $waktu->waktu_pesimistik;
        $this->tgl_mulai = $waktu->tgl_mulai;
        $this->tgl_selesai = $waktu->tgl_selesai;

        $this->openModal();
    }

    public function update()
    {
        if ($this->waktuId) {
            $waktu = Tugas_proyek::findOrFail($this->waktuId);
            $waktu->update([
                'waktu_optimistik' => $this->waktu_optimistik,
                'waktu_realistik' => $this->waktu_realistik,
                'waktu_pesimistik' => $this->waktu_pesimistik,
                'durasi' => ($this->waktu_optimistik+$this->waktu_realistik*4+$this->waktu_pesimistik)/6,
                'varian' => ($this->waktu_pesimistik-$this->waktu_optimistik/6)^2,
                'tgl_mulai' => $this->tgl_mulai,
                'tgl_selesai' => $this->tgl_selesai,
            ]);
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->resetInput();
        }
    }

    public function render()
    {
        /* Query one to one join select * from  tugas_waktu join tugas_proyek where
        tugas_proyek.proyek_id = $this->proyekId */
        $waktus =  Tugas_proyek::where('proyek_id', $this->proyekId)
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_tugas', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.admin.admin-proyek-waktu',
        [
            'waktus' => $waktus,
        ]);
    }
}
