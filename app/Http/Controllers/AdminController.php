<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Absensi;
use App\Models\Ket_Absensi;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        $absensi = Absensi::with('ket_id')->get();
        $user = User::with('role_id')->get();
        $paginate = User::where('role_id', 2)->orderBy('id', 'asc')->paginate(3);
        return view('adminHome', ['absensi' => $paginate,]);
    }

    public function create()
    {
        $ket_absensi = Ket_Absensi::all();
        return view('admin.create', ['ket_absensi' => $ket_absensi]);
    }

    public function store(Request $request)
    {
        $absensi = new Absensi;
        $absensi->tgl = $request->get('Tgl');
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'foto' => 'required',
        ]);

        $user = User::with('role_id')->where('id', $id)->first();

        if ($user->foto && file_exists(storage_path('app/public' . $user->foto))) {
            Storage::delete('public/' . $user->foto);
        }

        $imageName = $request->file('foto')->store('images', 'public');

        $user->foto = $imageName;
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $role = new Role;
        $role->id = request('role_id');

        $user->role()->associate($role);
        $user->save();

        return redirect()->route('admin.index')
            ->with('success', 'Karyawan Berhasil Diupdate');
    }

    public function destroy($id)
    {
        Absensi::where('id', $id)->delete();
        return redirect()->route('admin.index')
            ->with('success', 'Karyawan Berhasil Dihapus');
    }

    public function cetakAbsen($id)
    {
    }
}
