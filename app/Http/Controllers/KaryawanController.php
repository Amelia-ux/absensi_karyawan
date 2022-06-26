<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;

use App\Models\Absensi;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function absensi(Request $request)
    {
        $this->validate($request, [
            'users_id' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
        ]);

        $absen = new Absensi;
        $absen->users_id = $request->users_id;
        $absen->status = $request->status;
        $absen->keterangan = $request->keterangan;
        $absen->save();
        return back();
    }
}
