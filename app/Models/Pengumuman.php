<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    protected $table='pengumumen';
    protected $fillable=[
        'judul',
        'isi',
        'gambar',
        'kelas_id',
        'user_id',
    ];
    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
    public function guru(){
        return $this->belongsTo(User::class,'guru_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }

}
