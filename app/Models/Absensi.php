<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ket_Absensi;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensi';

    public function ket_absensi()
    {
        return $this->belongsTo(Ket_Absensi::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
