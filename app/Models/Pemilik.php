<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemilik extends Model
{
    use HasFactory;
    protected $fillable = [
        'deskripsi_pemilik',
        'alamat_pemilik',
        'nohp_pemilik',
        'jenis_pemilik',
        'pekerjaan_pemilik',
        'nama_instansi',
        'jenis_instansi',
        'alamat_instansi',
        'user_id',
    ];
    protected $guarded = [];
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
