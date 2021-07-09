<?php

namespace App\Http\Controllers;

use App\User;
use App\Cuti;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $you = auth()->user();
        $user = User::all();

        if($you->role == 'admin'){
            return view('admin.userList', compact('you', 'user'));
        }
        else if($you->role == 'staff'){
            return view('staff.userList', compact('you', 'user'));
        }
    }

    public function create()
    {
        $you = auth()->user();
        $user = User::all();

        if($you->role == 'admin'){
            return view('admin.createUser', compact('user', 'you'));
        }
        else if($you->role == 'staff'){
            return view('staff.createUser', compact('you', 'user'));
        }
    }

    public function store(Request $request)
    {
        $you = auth()->user();
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make('password'),
            'nik' => $request['nik'],
            'jenis_kelamin' => $request['jenis_kelamin'],
            'alamat' => 'null',
            'no_hp' => 'null',
            'role' => $request['role']
        ]);
        $user->save();

        $cuti = Cuti::create([
            'user_nik' => $request['nik'],
            'total_cuti' => '0',
            'tahun' => date('Y', strtotime($user->created_at))
        ]);
        $cuti->save();

        $request->session()->flash('message', 'Suksses menambahkan data');
        if($you->role == 'admin'){
            return redirect()->route('user-list');
        }else if($you->role == 'staff'){
            return redirect()->route('staff-userList');
        }
    }

    public function edit($id)
    {
        $you = auth()->user();
        $user = User::find($id);

        return view('admin.editUser', compact('user', 'you'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->name         = $request->input('name');
        $user->password     = Hash::make($request->input('password'));
        $user->nik          = $request->input('nik');
        $user->no_hp         = $request->input('no_hp');
        $user->role         = $request->input('role');
        $user->save();
        $request->session()->flash('message', 'Sukses Edit Data User');

        return redirect()->route('user-list');
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        if($user){
            $user->delete();
        }
        return redirect()->route('user-list');
    }

    //Karyawan && Staff
    public function profil()
    {
        $you = auth()->user();
        $cuti = Cuti::select('cutis.id', 'users.name', 'users.alamat', 'users.alamat', 'users.nik', 'users.no_hp', 'cutis.total_cuti', 'cutis.tahun')
                ->leftJoin('users', 'users.nik', '=', 'cutis.user_nik')
                ->where('users.id', '=', $you->id)
                ->get();
        if($you->role == 'karyawan'){
            return view('karyawan.profil', compact('you', 'cuti'));
        }else if($you->role == 'staff'){
            return view('staff.profil', compact('you', 'cuti'));
        }
    }

    public function editProfil($id)
    {
        $you = auth()->user();
        $user = User::find($id);

        if($you->role == 'karyawan'){
            return view('karyawan.editProfil', compact('you', 'user'));
        }else if($you->role == 'staff'){
            return view('staff.editProfil', compact('you', 'user'));
        }
    }

    public function updateProfil(Request $request, $id)
    {
        $you = auth()->user();
        $user = User::find($id);
        $user->name         = $request->input('name');
        $user->email        = $request->input('email');
        $user->alamat       = $request->input('alamat');
        $user->password     = Hash::make($request->input('password'));
        $user->no_hp        = $request->input('no_hp');
        $user->save();
        $request->session()->flash('message', 'Sukses Edit Profil');

        if($you->role == 'karyawan'){
            return redirect()->route('profil');
        }else if($you->role == 'staff'){
            return redirect()->route('staff-profil');
        }

    }

}
