<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas_proyek extends Model
{
    use HasFactory;

    protected $fillable = [
        'proyek_id',
        'nama_tugas',
        'kode',
        'deskripsi_tugas',
        'tahapan_tugas',
        'progres_tugas',
        'status_tugas',
        'waktu_optimistik',
        'waktu_realistik',
        'waktu_pesimistik',
        'durasi',
        'varian',
        'tgl_mulai',
        'tgl_selesai',
        'biaya_gaji',
        'biaya_lain',
        'jml_biaya',

    ];

    public function proyek()
    {
        return $this->belongsTo(Proyek::class);
    }

    public function user()
    {
    	return $this->belongsToMany(User::class, 'pekerjaans', 'tugas_id', 'user_id')->withTimestamps();
    }

    public function estimasi()
    {
        return $this->hasMany(Estimasi::class);
    }

    public function aktivitas()
    {
        return $this->hasMany(Aktivitas_pekerjaan::class);
    }
}
