<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruKelasMapel extends Model
{
    protected $table='guru_kelas_mapel';
    protected $fillable=[
        'guru_id',
        'kelas_id',
        'mapel_id',
    ];
    public function guru() {
        return $this->belongsTo(User::class, 'guru_id');
    }
    public function kelas() {
        return $this->belongsTo(Kelas::class);
    }
    public function mapel() {
        return $this->belongsTo(Mapel::class);
    }
}
