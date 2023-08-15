<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data_user = [
            [
                'nama' => 'admin',
                'username' => 'admin',
                'password' => Hash::make('admin'),
                'role' => 'admin1',
            ],
            [
                'nama' => 'admin2',
                'username' => 'admin2',
                'password' => Hash::make('admin2'),
                'role' => 'admin2',
            ],
            [
                'nama' => 'pengawas',
                'username' => 'pengawas',
                'password' => Hash::make('pengawas'),
                'role' => 'pengawas',
            ],
            [
                'nama' => 'mahasiswa',
                'username' => 'mahasiswa',
                'password' => Hash::make('mahasiswa'),
                'role' => 'mahasiswa',
            ],
        ];

        foreach ($data_user as $user) {
            \App\Models\User::create($user);
        }
    }
}
