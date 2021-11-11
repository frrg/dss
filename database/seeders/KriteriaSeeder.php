<?php

namespace Database\Seeders;

use App\Models\KriteriaM;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 10; $i++){
            $kriteria[] = [
                'kriteria_kode' => 'K'.$i,
                'kriteria_keterangan' => 'Keterangan Kriteria '.$i,
                'kriteria_jenis' => ($i % 2 == 0) ? 'BENEFIT' : 'COST',
                'created_at' => now()
            ];
        }
        return KriteriaM::insert($kriteria);
    }
}
