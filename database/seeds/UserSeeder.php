<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'nik' => '001',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => '',
            'no_hp' => '',
            'role' => 'admin',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Staff',
            'email' => 'staff@staff.com',
            'nik' => '002',
            'jenis_kelamin' => 'perempuan',
            'alamat' => '',
            'no_hp' => '',
            'role' => 'staff',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'name' => 'Karyawan',
            'email' => 'karyawan@karyawan.com',
            'nik' => '003',
            'jenis_kelamin' => 'laki-laki',
            'alamat' => '',
            'no_hp' => '',
            'role' => 'karyawan',
            'password' => Hash::make('password'),
        ]);
    }
}
