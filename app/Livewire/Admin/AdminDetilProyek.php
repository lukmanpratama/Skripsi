<?php

namespace App\Livewire\Admin;

use App\Models\Tim;
use App\Models\User;
use App\Models\Proyek;
use Livewire\Component;

class AdminDetilProyek extends Component
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

        return view('livewire.admin.admin-detil-proyek',[
            'tims' => $tims,

        ]);
    }
}
