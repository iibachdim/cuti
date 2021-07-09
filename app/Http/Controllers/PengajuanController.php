<?php

namespace App\Http\Controllers;

use App\Pengajuan;
use App\Cuti;
use App\User;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    //Admin && Staff

    public function index()
    {
        $you = auth()->user();
        $pengajuan = Pengajuan::select('pengajuans.id', 'users.name', 'users.nik', 'pengajuans.tanggal', 'pengajuans.status', 'cutis.total_cuti')
                                ->leftJoin('users', 'users.id', '=', 'pengajuans.user_id')
                                ->leftJoin('cutis', 'cutis.id', '=', 'pengajuans.cuti_id')
                                ->get();
        if($you->role == 'admin'){
            return view('admin.daftarPengajuan', compact('you', 'pengajuan'));
        }else if($you->role == 'staff'){
            return view('staff.daftarPengajuan', compact('you', 'pengajuan'));
        }
    }

    public function detail($id)
    {
        $you = auth()->user();
        $pengajuan = Pengajuan::select('pengajuans.id', 'users.name', 'users.nik', 'pengajuans.tanggal', 'pengajuans.status', 'cutis.total_cuti')
                                ->leftJoin('users', 'users.id', '=', 'pengajuans.user_id')
                                ->leftJoin('cutis', 'cutis.id', '=', 'pengajuans.cuti_id')
                                ->where('pengajuans.id', '=', $id)
                                ->get();

        if($you->role == 'admin'){
            return view('admin.detailPengajuan', compact('you', 'pengajuan'));
        }else if($you->role == 'staff'){
            return view('staff.detailPengajuan', compact('you', 'pengajuan'));
        }
    }

    public function accept(Request $request, $id)
    {
        $you = auth()->user();
        $accept = Pengajuan::find($id);
        $accept->status = 'diterima';
        $accept->save();
        $request->session()->flash('message', 'Pengajuan diterima');


        $cuti = Cuti::query()
                    ->where('cutis.id', '=', $accept->cuti_id)
                    ->get();

        foreach($cuti as $c){
            $c->total_cuti = $c->total_cuti - 1;
            $c->save();
        }

        if($you->role == 'admin'){
            return redirect()->route('pengajuan-list');
        }else if($you->role == 'staff'){
            return redirect()->route('staff-pengajuanList');
        }
    }

    public function reject(Request $request, $id)
    {
        $you = auth()->user();
        $reject = Pengajuan::find($id);
        $reject->status = 'ditolak';
        $reject->save();
        $request->session()->flash('message', 'Pengajuan diterima');


        if($you->role == 'admin'){
            return redirect()->route('pengajuan-list');
        }else if($you->role == 'staff'){
            return redirect()->route('staff-pengajuanList');
        }
    }

    //Karyawan

    public function formPengajuan()
    {
        $you = auth()->user();
        $pengajuan = Pengajuan::all();
        $cuti = Cuti::select('cutis.id', 'users.name', 'users.alamat', 'users.alamat', 'users.nik', 'users.no_hp', 'cutis.total_cuti', 'cutis.tahun')
                    ->leftJoin('users', 'users.nik', '=', 'cutis.user_nik')
                    ->where('users.id', '=', $you->id)
                    ->get();

        return view('karyawan.formPengajuan', compact('you', 'pengajuan', 'cuti'));
    }

    public function prosesPengajuan(Request $request)
    {
        $you = auth()->user();
        $cuti = Cuti::select('cutis.id', 'users.name', 'users.alamat', 'users.alamat', 'users.nik', 'users.no_hp', 'cutis.total_cuti', 'cutis.tahun')
                    ->leftJoin('users', 'users.nik', '=', 'cutis.user_nik')
                    ->where('users.id', '=', $you->id)
                    ->get();

        foreach($cuti as $c){
            $pengajuan = Pengajuan::create([
                'user_id' => $you->id,
                'cuti_id' => $c->id,
                'tanggal' => $request['tanggal'],
                'status'  => 'pengajuan'
            ]);
            $pengajuan->save();
        }

        $request->session()->flash('message', 'Suksses mengajukan cuti');
        return redirect()->route('pengajuan-cuti');
    }

    public function create()
    {
        $you = auth()->user();

        return view('karyawan.formPengajuan', compact('you'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $year = date('Y');

        $cuti = Cuti::select('cutis.id', 'users.name', 'users.nik', 'cutis.total_cuti', 'cutis.tahun')
                ->leftJoin('users', 'cutis.user_nik', '=', 'users.nik')
                ->where('users.id', '=', $user->id)
                ->where('cutis.tahun', '=', $year)
                ->get();

        $pengajuan = Pengajuan::create([
            'user_id' => $user->id,
            'cuti_id' => $cuti->id,
            'date' => $request['tanggal'],
            'status' => 'pengajuan'
        ]);
        $pengajuan->save();

        return redirect()->route('');
    }

    public function pengajuan()
    {
        $user = auth()->user();
        $pengajuan = Pengajuan::all();
        $cuti = Cuti::select('cutis.id', 'users.name', 'users.nik', 'cutis.total_cuti', 'cutis.tahun')
                ->leftJoin('users', 'cutis.user_nik', '=', 'users.nik')
                ->where('users.id', '=', $user->id)
                ->get();

    }

    public function status()
    {
        $you = auth()->user();
        $pengajuan = Pengajuan::select('pengajuans.id', 'users.name','users.id', 'users.nik', 'pengajuans.tanggal', 'pengajuans.status', 'cutis.total_cuti')
                                ->leftJoin('users', 'users.id', '=', 'pengajuans.user_id')
                                ->leftJoin('cutis', 'cutis.id', '=', 'pengajuans.cuti_id')
                                ->where('users.id', '=', $you->id)
                                ->get();

        return view('karyawan.statusPengajuan', compact('you', 'pengajuan'));
    }
}
