<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ket_Absensi extends Model
{
    use HasFactory;
    protected $table = 'ket_absensi';

    protected $fillable = [
        'ket_absensi'
    ];
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
}
