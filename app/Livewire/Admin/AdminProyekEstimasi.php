<?php

namespace App\Livewire\Admin;

use App\Models\Proyek;
use Livewire\Component;
use App\Models\Estimasi;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Tugas_proyek;


class AdminProyekEstimasi extends Component
{
    use \Livewire\WithPagination;

    public $proyekId;

    public $estimasiId;

    public $predecessor;

    public $estimasiproyek;

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

    public function mount($id)
    {
        //get post
        $proyek = Proyek::find($id);

        //assign
        $this->proyekId   = $proyek->id;
        if($proyek){
            $this->estimasiproyek = $proyek;
        }
    }

    public function edit($id)
    {
        $estimasi = Estimasi::findOrFail($id);
        $this->estimasiId = $id;
        $this->predecessor = $estimasi->predecessor;
    }

    public function update()
    {
        if ($this->estimasiId)
        {
            $estimasi = Estimasi::findOrFail($this->estimasiId);
            $estimasi->update([
                'ES' => ,
            ]);
        }
    }

    public function render()
    {
        $estimasis = Estimasi::with('tugas')->whereHas('tugas', function ($query) {
            return $query->where('proyek_id', $this->proyekId);
        })
        ->when($this->search, function ($search)
        {
            $search->where(function ($search)
            {
                $search->where('nama_tugas', 'like', '%'.$this->search.'%');
            });
        },fn ($search) =>$search->latest())
        ->paginate($this->limit);
        return view('livewire.admin.admin-proyek-estimasi',
        [
            'estimasis' => $estimasis,
        ]);
    }
}
