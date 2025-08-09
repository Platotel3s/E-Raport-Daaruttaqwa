<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'nomorHp',
        'alamat',
        'role',
        'kelas_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function kelasMapel() {
        $this->hasMany(GuruKelasMapel::class,'guru_id');
    }
    public function scopeSiswa($query){
        return $query->where('role','siswa');
    }
    public function kelasDiwalikan(){
        return $this->hasOne(Kelas::class,'wali_kelas_id');
    }
}
