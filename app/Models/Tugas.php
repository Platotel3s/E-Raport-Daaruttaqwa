<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table='tugas';
    protected $fillable=[
        'judul',
        'deskripsi',
        'guru_id',
        'kelas_id',
        'deadline',
    ];
    public function guru(){
        return $this->belongsTo(User::class,'guru_id');
    }
    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }
    public function pengumpulan(){
        return $this->hasMany(PengumpulanTugas::class);
    }
}
