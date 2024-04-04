<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyek extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_proyek',
        'jenis_proyek',
        'deskripsi_proyek',
        'tahapan_proyek',
        'progres',
        'status_proyek',
        'tgl_mulai',
        'tgl_selesai',
    ];
    public function user()
    {
    	return $this->belongsToMany(User::class, 'tims')->withTimestamps();
    }
    public function tugas()
    {
        return $this->hasMany(Tugas_proyek::class);
    }
}
