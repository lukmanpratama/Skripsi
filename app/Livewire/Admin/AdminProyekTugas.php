<?php

namespace App\Livewire\Admin;

use App\Models\Proyek;
use Livewire\Component;
use App\Models\Pekerjaan;
use App\Models\Estimasi;
use App\Models\Tugas_proyek;
use Livewire\Attributes\Rule;

class AdminProyekTugas extends Component
{
    #[Rule('required|min:3')]
    public $nama_tugas;

    public $kode_tugas;

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
        $this->kode_tugas = '';
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

    public function store()
    {

        $tugas = Tugas_proyek::create([
            'proyek_id' => $this->proyekId,
            'nama_tugas' => $this->nama_tugas,
            'kode'          => $this->kode_tugas,
            'tahapan_tugas' => $this->tahapan_tugas,
            'progres_tugas' => $this->progres_tugas,
            'status_tugas' =>  $this->status_tugas,
            'deskripsi_tugas' => $this->deskripsi_tugas,
            'waktu_optimistik' => null,
            'waktu_realistik' => null,
            'waktu_pesimistik' => null,
            'durasi' => null,
            'varian' => null,
            'tgl_mulai' => Null,
            'tgl_selesai' => Null,
            'biaya_gaji' => null,
            'biaya_lain' => null,
            'jml_biaya' => null,
        ]);
        $pekerjaan = Pekerjaan::create([
            'tugas_id' => $tugas->id,
            'user_id' => $this->userId,
        ]);
        $estimasi = Estimasi::create([
            'tugas_id'      => $tugas->id,

            'predecessor'   => '',
            'ES'            => 0,
            'EF'            => 0,
            'LS'            => 0,
            'LF'            => 0,
            'slack'         => 0,
        ]);
            session()->flash('Proyek created successfully', 'success');

            $this->reset('nama_tugas','deskripsi_tugas');
            $this->closeModal();
        return $estimasi;
        return $pekerjaan;
    }

    public function edit($id)
    {
        $tugas = Tugas_proyek::findOrFail($id);
        $this->tugasId = $id;
        $this->nama_tugas = $tugas->nama_tugas;
        $this->kode_tugas = $tugas->kode;
        $this->deskripsi_tugas = $tugas->deskripsi_tugas;
        $this->tahapan_tugas = $tugas->tahapan_tugas;
        $this->progres_tugas = $tugas->progres_tugas;
        $this->status_tugas = $tugas->status_tugas;


        $this->openModal();
    }

    public function update()
    {
        if ($this->tugasId) {
            $tugas = Tugas_proyek::findOrFail($this->tugasId);
            $tugas->update([
                'nama_tugas' => $this->nama_tugas,
                'kode'          => $this->kode_tugas,
                'tahapan_tugas' => $this->tahapan_tugas,
                'progres_tugas' => $this->progres_tugas,
                'status_tugas' => $this->status_tugas,
                'deskripsi_tugas' => $this->deskripsi_tugas,
            ]);
            $pekerjaan = Pekerjaan::where('tugas_id', $this->tugasId);
            $pekerjaan->update([
                'user_id' => $this->userId,
            ]);
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->resetInput();
        }
    }

    public function delete($id)
    {
        Tugas_proyek::find($id)->delete();
        session()->flash('success', 'Post deleted successfully.');
        $this->reset('nama_tugas','deskripsi_tugas');
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
        return view('livewire.admin.admin-proyek-tugas',[
            'tugass' => $tugass,
        ]);
    }
}
