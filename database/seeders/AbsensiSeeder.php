<?php

namespace Database\Seeders;

use App\Models\Absensi;
use Illuminate\Database\Seeder;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $absensi = [
            [
                'tgl' => '2022-06-06',
                'user_id' => '2',
                'ket_id' => '1'
            ],
            [
                'tgl' => '2022-06-10',
                'user_id' => '2',
                'ket_id' => '3'
            ]
        ];

        foreach ($absensi as $key => $value) {
            Absensi::create($value);
        }
    }
}
