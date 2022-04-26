<?php

namespace App\Http\Controllers;

use App\Models\KriteriaM;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    public function count()
    {
        $title = "Hasil Perhitungan";
        $pelamars = Pelamar::all();
        $kriterium = KriteriaM::all();
        $minMax = $this->getMinMax($pelamars, $kriterium);
        $normalisasiDanRanking = $this->normalisasiDanRanking($pelamars, $minMax);
        $normalisasi = $normalisasiDanRanking['normalisasi'];
        $ranking = $normalisasiDanRanking['ranking'];
        return view('dashboard.penilaian.count', compact('ranking','normalisasi','title','minMax','kriterium','pelamars'));
    }

    protected  function getMinMax($pelamars, $kriterium)
    {
        $kodeKriteria = [];
        foreach ($kriterium as $kriteria) {
            $kodeKriteria[$kriteria->kriteria_kode] = [];
            foreach ($pelamars as $pelamar) {
                foreach ($pelamar->penilaian as $nilai) {
                    if ($nilai->kriteria->kriteria_kode == $kriteria->kriteria_kode) {
                        $kodeKriteria[$kriteria->kriteria_kode][] = $nilai->bobot_kriteria->bobot;
                    }
                }
            }

            if ($kriteria->kriteria_jenis == 'COST') {
                $kodeKriteria[$kriteria->kriteria_kode] = min($kodeKriteria[$kriteria->kriteria_kode]);
            }
            if ($kriteria->kriteria_jenis == 'BENEFIT') {
                $kodeKriteria[$kriteria->kriteria_kode] = max($kodeKriteria[$kriteria->kriteria_kode]);
            }
        }
        return $kodeKriteria;
    }

    protected function normalisasiDanRanking($pelamars, $minMax)
    {
        foreach ($pelamars as $pelamar) {
            $total = 0;
            foreach ($pelamar->penilaian as $nilai) {
                $normalisasis = $this->hitungNormalisasi($nilai, $minMax);
                $allNormalisasi[$nilai->kriteria->kriteria_kode] = $normalisasis;
                $total =  number_format($total + ($nilai->kriteria->kriteria_bobot * $normalisasis), 2);
            }
            $normalisasi[$pelamar->pelamar_nama] = $allNormalisasi;
            $ranking[] = [
                'nama' => $pelamar->pelamar_nama,
                'alamat' => $pelamar->pelamar_alamat,
                'jekel' => $pelamar->pelamar_jekel,
                'total' => $total,
            ];
        }
        usort($ranking, function ($a, $b) {
            return strcmp($a['total'], $b['total']);
        });
        $ranking = array_reverse($ranking);
        $result = compact('normalisasi', 'ranking');
        return $result;
    }


    protected function hitungNormalisasi($nilai, $minMax)
    {
        if ($nilai->kriteria->kriteria_jenis == "COST") {
            return number_format(($minMax[$nilai->kriteria->kriteria_kode] / $nilai->bobot_kriteria->bobot), 2);
        } else {
            return number_format(($nilai->bobot_kriteria->bobot / $minMax[$nilai->kriteria->kriteria_kode]), 2);
        }
    }
}
