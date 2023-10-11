<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\petugas;

class CreatePetugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'id_petugas'=>'admin1',
                'nama'=>'Admin',
                'username'=>'admin',
                'password'=> bcrypt('admin123'),
                'telp'=>'0812345678',
                'level'=>'admin',
            ],
            [
                'id_petugas'=>'gurubk1',
                'nama'=>'Guru BK',
                'username'=>'bk',
                'password'=> bcrypt('guru123'),
                'telp'=>'08571234657',
                'level'=> 'gurubk',
            ],
            
        ];
            
        foreach ($users as $key => $val) {
            Petugas::create($val);
        }
    }
}
