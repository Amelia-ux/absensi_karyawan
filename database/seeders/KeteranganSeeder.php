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
                'keterangan' => 'Present',
            ],
            [
                'keterangan' => 'Late',
            ],
            [
                'keterangan' => 'Sick',
            ],
            [
                'keterangan' => 'Absent'
            ],
        ];

        foreach ($ket as $key => $value) {
            ket_absensi::create($value);
        }
    }
}
