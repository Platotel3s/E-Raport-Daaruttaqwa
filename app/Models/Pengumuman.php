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
    ];
}
