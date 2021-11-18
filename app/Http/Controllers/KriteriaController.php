<?php

namespace App\Http\Controllers;

use App\DataTables\KriteriaDataTable;
use App\Http\Requests\KriteriaStoreRequest;
use App\Http\Requests\KriteriaUpdateRequest;
use App\Models\KriteriaM;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(KriteriaDataTable $datatable)
    {
        $title = 'Data Kriteria';
        return view('dashboard.kriteria.index', compact('datatable', 'title'));
    }

    public function ajaxTable(Request $r, KriteriaDataTable $datatable)
    {
        if ($r->ajax()) {
            $kriteria = KriteriaM::query();
            return $datatable->dataTable($kriteria);
        }
    }

    public function create()
    {
        $title = 'Tambah Data Kriteria';
        return view('dashboard.kriteria.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit Data Kriteria';
        $kriteria = KriteriaM::findOrFail($id);
        return view('dashboard.kriteria.edit', compact('kriteria','title'));
    }

    public function store(KriteriaStoreRequest $request)
    {
        $data = $request->validated();
        $newKriteria = KriteriaM::create($data);
        if ($newKriteria) {
            return redirect()->route('kriteria.create')->with('message', 'Berhasil Tambah Data');
        } else {
            return redirect()->route('kriteria.create')->with('message', 'Gagal Tambah Data');
        }
    }

    public function update(KriteriaUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $kriteria = KriteriaM::find($id);
        if ($kriteria) {
            $updateKriteria = $kriteria->update($data);
            if ($updateKriteria) {
                return redirect()->route('kriteria.edit',$id)->with('message', 'Berhasil Update Data');
            }
        }
        return redirect()->route('kriteria.edit',$id)->with('message', 'Gagal Update Data');
    }

    public function destroy($id)
    {
        $kriteriaDelete = KriteriaM::findOrFail($id);
        $kriteriaDelete->delete();
        return response()->jsonApi(200, 'OK');
    }
}
