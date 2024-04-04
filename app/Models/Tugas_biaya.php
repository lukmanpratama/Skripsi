<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas_biaya extends Model
{
    use HasFactory;
    protected $fillable = [
        'tugas_id',
        'biaya_gaji',
        'biaya_lain',
        'jml_biaya',
    ];
    public function tugas()
    {
        return $this->belongsTo(Tugas_proyek::class);
    }
}
