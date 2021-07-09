<?php

namespace App\Http\Controllers;

use App\User;
use App\Cuti;
use Illuminate\Http\Request;
use UserSeeder;

class CutiController extends Controller
{
    //Amin && Staff
    public function index()
    {
        $you = auth()->user();
        $user = Cuti::select('cutis.id', 'users.name', 'users.nik', 'cutis.total_cuti', 'cutis.tahun')
                    ->leftJoin('users', 'users.nik', '=', 'cutis.user_nik')
                    ->get();
        if($you->role == 'admin'){
            return view('admin.cutiList', compact('you', 'user'));
        }else if($you->role == 'staff'){
            return view('staff.cutiList', compact('you', 'user'));
        }
    }

    public function createCuti()
    {
        $you = auth()->user();
        $cuti = Cuti::all();

        return view('admin.cutiCreate', compact('you', 'cuti'));
    }

    public function storeCuti(Request $request)
    {
        $user = User::query()
                    ->where('users.nik', '=', $request['user_nik'])
                    ->get();

        $cuti = Cuti::select('cutis.id', 'users.name', 'users.nik', 'cutis.total_cuti', 'cutis.tahun')
                    ->leftJoin('users', 'users.nik', '=', 'cutis.user_nik')
                    ->where('cutis.user_nik', '=', $request['user_nik'])
                    ->get();

        $validate = '';

        foreach($user as $u){
            if($request['user_nik'] == $u->nik){
                foreach($cuti as $c){
                    if($c->tahun == $request['tahun']){
                        $validate = 'match';
                    }
                }
                if($validate == 'match'){
                    echo "<script>alert('Gagal di tambahkan karena Tahun sudah ada!');history.go(-1);</script>";
                }else
                $data = Cuti::create([
                    'user_nik' => $request['user_nik'],
                    'total_cuti' => $request['total_cuti'],
                    'tahun' => $request['tahun']
                ]);
                $data->save();
                return redirect()->route('cuti-list');
            }
        }
        echo "<script>alert('NIK tidak tersedia');history.go(-1);</script>";
    }

    //Admin && Staff
    public function addCuti($id)
    {
        $you = auth()->user();
        $user = Cuti::select('cutis.id', 'users.name', 'users.nik', 'cutis.total_cuti', 'cutis.tahun')
                    ->leftJoin('users', 'cutis.user_nik', '=', 'users.nik')
                    ->where('cutis.id', '=', $id)
                    ->get();
        if($you->role == 'admin'){
            return view('admin.cutiAdd', compact('you', 'user'));
        }else if($you->role == 'staff'){
            return view('staff.cutiAdd', compact('you', 'user'));
        }
    }

    public function updateCuti(Request $request, $id)
    {
        $you = auth()->user();
        $cuti = Cuti::find($id);
        $cuti->total_cuti = $request->input('total_cuti');
        $cuti->save();

        $request->session()->flash('success', 'Sukses Tambah Total Cuti');
        if($you->role == 'admin'){
            return redirect()->route('cuti-list');
        }else if($you->role == 'staff'){
            return redirect()->route('staff-cutiList');
        }
    }




}
