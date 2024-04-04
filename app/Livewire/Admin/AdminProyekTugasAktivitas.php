<?php

namespace App\Livewire\Admin;

use App\Models\Proyek;
use Livewire\Component;
use App\Models\Tugas_proyek;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\Aktivitas_pekerjaan;
use Illuminate\Support\Facades\Storage;

class AdminProyekTugasAktivitas extends Component
{
    use \Livewire\WithPagination;

    use WithFileUploads;

    public $tugasId;

    public $aktivitasId;

    public $nama_aktivitas;

    public $deskripsi_aktivitas;

    public $dokumen_aktivitas;

    public $aktivitastugas;

    public $aktivitasproyek;

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
        $this->aktivitasId = '';
        $this->nama_aktivitas = '';
        $this->deskripsi_aktivitas = '';
        $this->dokumen_aktivitas = '';
    }
    public function mount($id, $tugas_id)
    {
        $proyek = Proyek::find($id);

        //assign
        if($proyek){
            $this->aktivitasproyek = $proyek;
        }
        //get post
        $tugas = Tugas_proyek::find($tugas_id);

        //assign
        $this->tugasId = $tugas->id;
        if($tugas){
            $this->aktivitastugas = $tugas;
        }
    }

    public function store()
    {

        $this->dokumen_aktivitas->storeAs('public/dokumen/', $this->dokumen_aktivitas->getClientOriginalName());
        $aktivitas = Aktivitas_pekerjaan::create([
            'tugas_id' => $this->tugasId,
            'user_id' => auth()->user()->id,
            'nama_aktivitas' => $this->nama_aktivitas,
            'deskripsi_aktivitas' => $this->deskripsi_aktivitas,
            'dokumen_aktivitas' => $this->dokumen_aktivitas->getClientOriginalName(),
        ]);
        $this->closeModal();

        return $aktivitas;
    }

    public function download(Aktivitas_pekerjaan $aktivitas)
    {
        /* Download Dokumen Dari Public Storage */
        if(Storage::disk('public')->exists("dokumen/$aktivitas->dokumen_aktivitas"))
        {
            return response()->download( storage_path('app/public/dokumen/'.$aktivitas->dokumen_aktivitas) );
        }
        session()->flash('status', 'file not found');

    }

    public function edit($id)
    {
        $aktivitas = Aktivitas_pekerjaan::findOrFail($id);
        $this->aktivitasId = $id;
        $this->nama_aktivitas = $aktivitas->nama_aktivitas;
        $this->deskripsi_aktivitas = $aktivitas->deskripsi_aktivitas;

        $this->openModal();
    }

    public function render()
    {
        $aktivitass = Aktivitas_pekerjaan::where('tugas_id', $this->tugasId)
        ->Where('user_id', auth()->user()->id)
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_aktivitas', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.admin.admin-proyek-tugas-aktivitas', [
            'aktivitass' => $aktivitass,
        ]);
    }
}
