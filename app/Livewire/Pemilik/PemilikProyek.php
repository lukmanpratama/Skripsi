<?php

namespace App\Livewire\Pemilik;

use Livewire\Component;
use App\Models\Proyek;
use App\Models\User;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

#[Title('Proyek|Proyek')]
class PemilikProyek extends Component
{
    use \Livewire\WithPagination;

    #[Rule('required')]
    public $nama_proyek;

    #[Rule('required')]
    public $jenis_proyek;

    #[Rule('required')]
    public $deskripsi_proyek;


    public $tahapan_proyek;


    public $progres;


    public $status_proyek;

    #[Rule('required')]
    public $tgl_mulai;

    #[Rule('required')]
    public $tgl_selesai;

    public string $search='';

    public $isOpen = 0;

    public $proyekId;

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
        $this->proyekId = '';
        $this->nama_proyek = '';
        $this->deskripsi_proyek = '';
        $this->jenis_proyek = '';
        $this->tahapan_proyek = '';
        $this->progres = '';
        $this->status_proyek = '';
        $this->tgl_mulai = '';
        $this->tgl_selesai = '';
    }

    public function store()
    {
        $this->validate();
        $proyek = Proyek::create([
            'nama_proyek' => $this->nama_proyek,
            'jenis_proyek' => $this->jenis_proyek,
            'deskripsi_proyek' => $this->deskripsi_proyek,
            'status_proyek' => $this->status_proyek,
            'tahapan_proyek' => $this->tahapan_proyek,
            'progres' => $this->progres,
            'tgl_mulai' => $this->tgl_mulai,
            'tgl_selesai' => $this->tgl_selesai,

        ]);
        $proyek->user()->sync(auth()->user()->id);
        session()->flash('Proyek created successfully', 'success');

        $this->resetInput();
        $this->closeModal();

        return $proyek;
    }

    public function edit($id)
    {
        $proyek = Proyek::findOrFail($id);
        $this->proyekId = $id;
        $this->nama_proyek = $proyek->nama_proyek;
        $this->jenis_proyek = $proyek->jenis_proyek;
        $this->deskripsi_proyek = $proyek->deskripsi_proyek;
        $this->status_proyek = $proyek->status_proyek;
        $this->tahapan_proyek = $proyek->tahapan_proyek;
        $this->progres = $proyek->progres;
        $this->tgl_mulai = $proyek->tgl_mulai;
        $this->tgl_selesai = $proyek->tgl_selesai;

        $this->openModal();
    }

    public function update()
    {
        if ($this->proyekId) {
            $proyek = Proyek::findOrFail($this->proyekId);
            $proyek->update([
                'nama_proyek' => $this->nama_proyek,
                'jenis_proyek' => $this->jenis_proyek,
                'deskripsi_proyek' => $this->deskripsi_proyek,
                'status_proyek' => $this->status_proyek,
                'tahapan_proyek' => $this->tahapan_proyek,
                'progres' => $this->progres,
                'tgl_mulai' => $this->tgl_mulai,
                'tgl_selesai' => $this->tgl_selesai,
            ]);
            session()->flash('success', 'Post updated successfully.');
            $this->closeModal();
            $this->resetInput();
        }
    }

    public function delete($id)
    {
        Proyek::find($id)->delete();
        session()->flash('success', 'Post deleted successfully.');
        $this->reset('nama_proyek','deskripsi_proyek');
    }

    public function render()
    {
        $proyeks = User::find(auth()->id())->proyek()
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_proyek', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.pemilik.pemilik-proyek',
        [
            'proyeks' => $proyeks,
        ]);
    }
}
