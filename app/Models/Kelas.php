<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table='kelas';
    protected $fillable=[
        'namaKelas',
    ];
    public function users(){
        return $this->hasMany(User::class);
    }
    public function walikelas(){
        return $this->belongsTo(User::class,'wali_kelas_id');
    }
    public function siswa(){
        return $this->hasMany(User::class);
    }
}
