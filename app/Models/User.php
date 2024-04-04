<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'foto',
        'role',
        'jabatan',
    ];
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function pemilik()
    {
        return $this->hasOne(Pemilik::class);
    }
    public function pegawai()
    {
        return $this->hasOne(Pegawai::class);
    }
    public function proyek()
    {
    	return $this->belongsToMany(Proyek::class, 'tims')->withTimestamps();
    }
    public function tugas()
    {
    	return $this->belongsToMany(Tugas_proyek::class, 'pekerjaans', 'tugas_id', 'user_id')->withTimestamps();
    }
}
