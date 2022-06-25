<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = [
            [
                'nama_role' => 'Admin',
            ],
            [
                'nama_role' => 'Karyawan'
            ]
        ];

        foreach ($role as $key => $value) {
            Role::create($value);
        }
    }
}
