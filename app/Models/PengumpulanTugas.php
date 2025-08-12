<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengumpulanTugas extends Model
{
    protected $fillable = ['tugas_id','siswa_id','jawaban','file','waktu_kumpul','nilai'];

    public function tugas(){
        return $this->belongsTo(Tugas::class);
    }
    public function siswa(){
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
