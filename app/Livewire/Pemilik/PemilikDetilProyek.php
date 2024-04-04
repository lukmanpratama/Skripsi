<?php

namespace App\Livewire\Pemilik;

use Livewire\Component;
use App\Models\User;
use App\Models\Proyek;

class PemilikDetilProyek extends Component
{
    public $detilproyek;

    public $nama_proyek;

    public $proyekId;

    public $pemilikproyek;

    public $deskripsi_proyek;

    public function mount($id)
    {
        //get post
        $proyek = Proyek::find($id);

        //assign
        $this->proyekId   = $proyek->id;
        $this->nama_proyek    = $proyek->nama_proyek;
        $this->deskripsi_proyek  = $proyek->deskripsi_proyek;

        if($proyek){
            $this->detilproyek = $proyek;
        }

    }

    public function render()
    {
        $tims = User::JOIN('tims', 'tims.user_id', '=', 'users.id')
        ->JOIN('proyeks','proyeks.id', '=', 'tims.proyek_id')
        ->WHERE('tims.proyek_id', '=', $this->proyekId)->get();

        return view('livewire.pemilik.pemilik-detil-proyek',
        [
            'tims' => $tims,

        ]);
    }
}
