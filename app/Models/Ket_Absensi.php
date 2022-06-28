<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ket_Absensi extends Model
{
    use HasFactory;
    protected $table = 'ket_absensi';

    protected $fillable = [
        'keterangan'
    ];

    public function absensi()
    {
        return $this->belongsToMany(Absensi::class, 'matakuliah_id');
    }
}
