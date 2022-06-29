<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Absensi;
use App\Models\Ket_Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $absensi = Absensi::with('user')->where('user_id', $user->id)->get();
        return view('karyawan.home', ['absensi' => $absensi, 'user' => $user]);
    }

    public function create(){
        $ket = Ket_Absensi::all();
        return view('karyawan.create', ['ket' => $ket]);
    }

    public function absensi(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'ket' => 'required'
        ]);

        $absensi = new Absensi;
        $absensi->tgl = Carbon::now();
        $absensi->ket_id = $request->get('ket');
        $absensi->user_id = $id;
        $absensi->save();

        return redirect()->route('home') //jika data berhasil ditambahkan kembali ke hal. utama
            ->with('success', 'Absensi Telah Berhasil');
    }
}
