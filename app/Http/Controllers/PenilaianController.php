<?php

namespace App\Http\Controllers;

use App\DataTables\PenilaianDataTable;
use App\Http\Requests\PenilaianStoreRequest;
use App\Http\Requests\PenilaianUpdateRequest;
use App\Models\KriteriaM;
use App\Models\Pelamar;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    protected $pelamar;
    public function __construct()
    {
        if (!is_null(request()->pelamar_penilaian)) {
            $this->pelamar = Pelamar::find(request()->pelamars);
        }
    }
    public function index(PenilaianDataTable $datatable)
    {
        $title = 'Data Penilaian';
        return view('dashboard.penilaian.index', compact('datatable', 'title'));
    }

    public function ajaxTable(Request $r, PenilaianDataTable $datatable)
    {
        if ($r->ajax()) {
            $pelamar = Pelamar::query();
            // $pelamar = Pelamar::select('pelamar.id', 'pelamar_nama', 'pelamar_alamat', 'penilaian_t.id as penilaian_id', 'penilaian_t.kriteria_id', 'penilaian_t.bobot_kriteria_id')
            //     ->rightJoin('penilaian_t', 'penilaian_t.pelamar_id', '=', 'pelamar.id');
                // dd($pelamar->get());
            return $datatable->dataTable($pelamar);
        }
    }

    public function create()
    {
        $title = 'Tambah Data Penilaian';
        $kriterium = KriteriaM::all();
        return view('dashboard.penilaian.create', compact('title', 'kriterium'));
    }

    // edit Nilai Pelamar
    public function edit($id)
    {
        $title = 'Edit Data Penilaian';
        $penilaian = Pelamar::findOrFail($id);
        $kriterium = KriteriaM::all();
        return view('dashboard.penilaian.edit', compact('penilaian', 'title', 'kriterium'));
    }

    public function handleDataInsert($request)
    {
        $data = [];
        $pelamar_id = $request->pelamar_id;
        foreach ($request->except('_token') as  $key => $val) {
            $explodeKey = explode('_', $key);
            if($key == "pelamar_id"){ continue;}
            $data[] = [
                'kriteria_id' => $explodeKey[1],
                'bobot_kriteria_id' => $val,
                'pelamar_id' => $pelamar_id,
                'created_at' => now()->toDateTimeString()
            ];
        }
        // dd($data);
        return $data;
    }

    public function store(PenilaianStoreRequest $request)
    {
        $dataInsert = $this->handleDataInsert($request);
        $newPenilaian = Penilaian::insert($dataInsert);
        if ($newPenilaian) {
            return redirect()->route('penilaian.create')->with('message', 'Berhasil Tambah Data');
        } else {
            return redirect()->route('penilaian.create')->with('message', 'Gagal Tambah Data');
        }
    }

    public function update(PenilaianUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $penilaian = Penilaian::find($id);
        if ($penilaian) {
            $updatePenilaian = $penilaian->update($data);
            if ($updatePenilaian) {
                return redirect()->route('penilaian.edit', $id)->with('message', 'Berhasil Update Data');
            }
        }
        return redirect()->route('penilaian.edit', $id)->with('message', 'Gagal Update Data');
    }

    public function destroy($id)
    {
        $penilaianDelete = Penilaian::findOrFail($id);
        $penilaianDelete->delete();
        return response()->jsonApi(200, 'OK');
    }
}
