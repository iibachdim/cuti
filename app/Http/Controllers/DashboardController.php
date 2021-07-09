<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function indexAdmin() {
        $you = auth()->user();

        $user = User::count();

        $admin = User::where('role', '=', 'admin')
                        ->count();

        $staff = User::where('role', '=', 'staff')
                        ->count();

        $karyawan = User::where('role', '=', 'karyawan')
                        ->count();

        return view('admin.adminDashboard', compact('you', 'user', 'admin', 'staff', 'karyawan'));
    }

    public function indexStaff() {
        $you = auth()->user();

        $user = User::count();

        $admin = User::where('role', '=', 'admin')
                        ->count();

        $staff = User::where('role', '=', 'staff')
                        ->count();

        $karyawan = User::where('role', '=', 'karyawan')
                        ->count();

        return view('staff.staffDashboard', compact('you', 'user', 'admin', 'staff', 'karyawan'));
    }

    public function indexKaryawan() {
        $you = auth()->user();
        return view('karyawan.karyawanDashboard', compact('you'));
    }
}
