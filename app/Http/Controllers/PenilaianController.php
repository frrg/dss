<?php

namespace App\Http\Controllers;

use App\DataTables\PenilaianDataTable;
use App\Http\Requests\PenilaianStoreRequest;
use App\Http\Requests\PenilaianUpdateRequest;
use App\Models\Pelamar;
use App\Models\Penilaian;
use Illuminate\Http\Request;

class PenilaianController extends Controller
{
    public function index(PenilaianDataTable $datatable)
    {
        $title = 'Data Penilaian';
        return view('dashboard.penilaian.index', compact('datatable', 'title'));
    }

    public function ajaxTable(Request $r, PenilaianDataTable $datatable)
    {
        if ($r->ajax()) {
            // $penilaian = Penilaian::query();
            $pelamar = Pelamar::select('pelamar.id','pelamar_nama','pelamar_alamat','penilaian_t.id as penilaian_id','penilaian_t.kriteria_id','penilaian_t.bobot_kriteria_id')
            ->leftJoin('penilaian_t','penilaian_t.pelamar_id','=','pelamar.id');
            return $datatable->dataTable($pelamar);
        }
    }

    public function create()
    {
        $title = 'Tambah Data Penilaian';
        return view('dashboard.penilaian.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit Data Penilaian';
        $penilaian = Penilaian::findOrFail($id);
        return view('dashboard.penilaian.edit', compact('penilaian','title'));
    }

    public function store(PenilaianStoreRequest $request)
    {
        $data = $request->validated();
        $newPenilaian = Penilaian::create($data);
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
                return redirect()->route('penilaian.edit',$id)->with('message', 'Berhasil Update Data');
            }
        }
        return redirect()->route('penilaian.edit',$id)->with('message', 'Gagal Update Data');
    }

    public function destroy($id)
    {
        $penilaianDelete = Penilaian::findOrFail($id);
        $penilaianDelete->delete();
        return response()->jsonApi(200, 'OK');
    }
}
