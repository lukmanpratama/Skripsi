<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aktivitas_pekerjaan extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'tugas_id',
        'user_id',
        'nama_aktivitas',
        'deskripsi_aktivitas',
        'dokumen_aktivitas',
    ];
    public function pekerjaan()
    {
        return $this->belongsTo(Tugas_proyek::class);
    }
}
