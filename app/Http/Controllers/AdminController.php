<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Absensi;
use App\Models\Ket_Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use PDF;

class AdminController extends Controller
{
    public function index()
    {
        if (Absensi::with('User', 'Ket_Absensi')->exists()) {
            $user = User::all();
            $paginate = Absensi::with('User', 'Ket_Absensi')->first()->orderBy('tgl', 'desc')->paginate(7);
            return view('admin.home', ['paginate' => $paginate, 'user' => $user]);
        } else {
            return view('admin.home');
        }
    }

    public function indexK()
    {
        $user = User::with('role')->where('role_id', 2)->get();
        // $paginate = User::orderBy('id', 'desc')->paginate(3);
        return view('admin.karyawan', ['user' => $user]);
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', ['user' => $user]);
    }

    public function createA()
    {
        $user = User::all();
        $ket_absensi = Ket_Absensi::all();
        return view('admin.createA', ['ket' => $ket_absensi, 'user' => $user]);
    }

    public function createU()
    {
        $role = Role::all();
        return view('admin.createU', ['roles' => $role]);
    }

    public function storeA(Request $request)
    {
        $id = Auth::user()->id;
        $this->validate($request, [
            'user' => 'required',
            'ket' => 'required',
            'tgl' => 'required'
        ]);

        $absensi = new Absensi;
        $absensi->tgl = $request->get('tgl');
        $absensi->ket_id = $request->get('ket');
        $absensi->user_id = $request->get('user');

        $ket_absensi = new Ket_Absensi;
        $ket_absensi->id = $request->get('ket');

        $user = new User;
        $user->id = $request->get('user');

        $absensi->user()->associate($user);
        $absensi->ket_absensi()->associate($ket_absensi);
        $absensi->save();

        return redirect()->route('admin.home') //jika data berhasil ditambahkan kembali ke hal. utama
            ->with('success', 'Absensi Telah Berhasil di Tambahkan');
    }

    public function storeU(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'foto' => 'required',
            'password' => 'required',
        ]);

        $user = new User;
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role_id = $request->get('role');
        $password = $request->get('password');
        $user->password = Hash::make($password);

        $imageName = '';

        if ($request->file('foto')) {
            $imageName = $request->file('foto')->store('images', 'public');
        }

        $user->foto = $imageName;
        $user->save();

        return redirect()->route('admin.karyawan') //jika data berhasil ditambahkan kembali ke hal. utama
            ->with('success', 'Data User Berhasil Ditambahkan');
    }

    public function show($id)
    {
        // $absensi = Absensi::with('Ket_Absensi')->where('id', $id)->first();
        // return view('admin.detail', ['absensi' => $absensi]);
    }

    public function editA($id)
    {
        $absensi = Absensi::with('User')->where('id', $id)->first();
        $ket_absensi = Ket_Absensi::all();
        $user = User::all();
        return view('admin.editA', ['absensi' => $absensi, 'user' => $user, 'ket' => $ket_absensi]);
    }

    public function editU($id)
    {
        $user = User::with('Role')->where('id', $id)->first();
        $role = Role::all();
        return view('admin.editU', ['user' => $user, 'role' => $role]);
    }

    public function updateA(Request $request, $id)
    {
        $request->validate([
            'tgl' => 'required',
            'user' => 'required',
            'ket' => 'required',
        ]);

        $absensi = Absensi::with('Ket_Absensi', 'User')->where('id', $id)->first();

        $absensi->tgl = $request->get('tgl');
        $absensi->user_id = $request->get('user');
        $absensi->ket_id = $request->get('ket');

        $ket_absensi = new Ket_Absensi;
        $ket_absensi->id = $request->get('ket');

        $user = new User;
        $user->id = $request->get('user');

        $absensi->user()->associate($user);
        $absensi->ket_absensi()->associate($ket_absensi);
        $absensi->save();

        return redirect()->route('admin.home')
            ->with('success', 'Data User Berhasil Diupdate');
    }

    public function updateU(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'foto' => 'required',
        ]);

        $user = User::with('role')->where('id', $id)->first();

        if ($user->foto && file_exists(storage_path('app/public' . $user->foto))) {
            Storage::delete('public/' . $user->foto);
        }

        $imageName = $request->file('foto')->store('images', 'public');

        $user->foto = $imageName;
        $user->name = $request->get('name');
        $user->email = $request->get('email');

        $role = new Role;
        $role->id = request('role');

        $user->role()->associate($role);
        $user->save();

        return redirect()->route('admin.karyawan')
            ->with('success', 'Data User Berhasil Diupdate');
    }

    public function destroyA($id)
    {
        Absensi::where('id', $id)->delete();
        return redirect()->route('admin.home')
            ->with('success', 'Data Absensi Berhasil Dihapus');
    }

    public function destroyU($email)
    {
        User::where('email', $email)->delete();
        return redirect()->route('admin.karyawan')
            ->with('success', 'Data Karyawan Berhasil Dihapus');
    }

    public function cetakAbsen($id)
    {
        $user = User::where('id', $id)->first();
        $absen = Absensi::with('User', 'Ket_Absensi')->where('user_id', $id)->first()->orderBy('tgl', 'desc')->paginate(7);
        $cetakAbsen = PDF::loadview('admin.cetakLaporan', ['user' => $user, 'absen' => $absen]);
        return $cetakAbsen->stream();
    }
}
