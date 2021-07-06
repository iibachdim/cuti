<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('roles')->insert([
            'nama' => 'admin'
        ]);
        DB::table('roles')->insert([
            'nama' => 'staff'
        ]);
        DB::table('roles')->insert([
            'nama' => 'karyawan'
        ]);
    }
}
