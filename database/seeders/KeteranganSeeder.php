<?php

namespace Database\Seeders;

use App\Models\Ket_Absensi;
use Illuminate\Database\Seeder;

class KeteranganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ket = [
            [
                'ket_absensi' => 'Present',
            ],
            [
                'ket_absensi' => 'Late',
            ],
            [
                'ket_absensi' => 'Sick',
            ],
            [
                'ket_absensi' => 'Absent'
            ],
        ];

        foreach ($ket as $key => $value) {
            ket_absensi::create($value);
        }
    }
}
