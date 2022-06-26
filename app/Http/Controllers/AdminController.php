<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Ket_Absensi;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('ket_id')->get();
        $paginate = Absensi::orderBy('id', 'desc')->paginate(3);
        return view('adminHome', ['absensi' => $paginate]);
    }

    public function create()
    {
        $ket_absensi = Ket_Absensi::all();
        return view('admin.create', ['ket_absensi' => $ket_absensi]);
    }

    public function store(Request $request)
    {
        $absensi = new Absensi;
        $absensi->tgl= $request->get('Tgl');
        $absensi->save();

        $ket_absensi = new Ket_Absensi;
        $ket_absensi->id = request('Ket_Absensi');

        $ket_absensi->ket_absensi()->associate($ket_absensi);
        $ket_absensi->save();

        return redirect()->route('admin.index') //jika data berhasil ditambahkan kembali ke hal. utama
            ->with('success', 'Absensi Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $absensi = Absensi::with('Ket_Absensi')->where('id', $id)->first();
        return view('admin.detail', compact('Absensi'));
    }

    public function edit($id)
    {
        $absensi = Absensi::with('Ket_Absensi')->where('id', $id)->first();
        $ket_absensi = Ket_Absensi::all();
        return view('admin.edit', compact('Absensi', 'ket_absensi'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Absensi::where('id', $id)->delete();
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Dihapus');
    }
}
