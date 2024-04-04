<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas_waktu extends Model
{
    use HasFactory;

    protected $fillable = [
        'tugas_id',
        'waktu_optimistik',
        'waktu_realistik',
        'waktu_pesimistik',
        'durasi',
        'tgl_mulai',
        'tgl_selesai',
    ];
    public function tugas()
    {
        return $this->belongsTo(Tugas_proyek::class);
    }
}
