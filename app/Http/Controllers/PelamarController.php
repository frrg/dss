<?php

namespace App\Http\Controllers;

use App\DataTables\PelamarDataTable;
use App\Http\Requests\PelamarStoreRequest;
use App\Http\Requests\PelamarUpdateRequest;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index(PelamarDataTable $datatable)
    {
        $title = 'Data Pelamar';
        return view('dashboard.pelamar.index', compact('datatable', 'title'));
    }

    public function ajaxTable(Request $r, PelamarDataTable $datatable)
    {
        if ($r->ajax()) {
            $pelamar = Pelamar::query();
            return $datatable->dataTable($pelamar);
        }
    }

    public function create()
    {
        $title = 'Tambah Data Pelamar';
        return view('dashboard.pelamar.create', compact('title'));
    }

    public function edit($id)
    {
        $title = 'Edit Data Pelamar';
        $pelamar = Pelamar::findOrFail($id);
        return view('dashboard.pelamar.edit', compact('pelamar','title'));
    }

    public function store(PelamarStoreRequest $request)
    {
        $data = $request->validated();
        $newPelamar = Pelamar::create($data);
        if ($newPelamar) {
            return redirect()->route('pelamar.create')->with('message', 'Berhasil Tambah Data');
        } else {
            return redirect()->route('pelamar.create')->with('message', 'Gagal Tambah Data');
        }
    }

    public function update(PelamarUpdateRequest $request, $id)
    {
        $data = $request->validated();
        $pelamar = Pelamar::find($id);
        if ($pelamar) {
            $updatePelamar = $pelamar->update($data);
            if ($updatePelamar) {
                return redirect()->route('pelamar.edit',$id)->with('message', 'Berhasil Update Data');
            }
        }
        return redirect()->route('pelamar.edit',$id)->with('message', 'Gagal Update Data');
    }

    public function destroy($id)
    {
        $pelamarDelete = Pelamar::findOrFail($id);
        $pelamarDelete->delete();
        return response()->jsonApi(200, 'OK');
    }
}
