<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'tugas_id',

        'predecessor',
        'ES',
        'EF',
        'LS',
        'LF',
        'slack',
    ];

    public function tugas()
    {
        return $this->belongsTo(Tugas_proyek::class);
    }
}
