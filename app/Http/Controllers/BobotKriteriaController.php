<?php

namespace App\Http\Controllers;

use App\DataTables\BobotKriteriaDataTable;
use App\Http\Requests\BobotKriteriaStoreRequest;
use App\Http\Requests\BobotKriteriaUpdateRequest;
use App\Models\BobotKriteria;
use App\Models\KriteriaM;
use Illuminate\Http\Request;

class BobotKriteriaController extends Controller
{
    protected $kriteria;

    public function __construct()
    {
        if (!is_null(request()->kriterium)) {
            $this->kriteria = KriteriaM::findOrFail(request()->kriterium);
        }
    }
    public function index(BobotKriteriaDataTable $datatable)
    {
        $title = "Data Bobot Kriteria {$this->kriteria->kriteria_keterangan}";
        $dataKriteria = $this->kriteria;
        $datatable->kriteria_id = $this->kriteria->id;
        return view('dashboard.bobot-kriteria.index', compact('datatable', 'title', 'dataKriteria'));
    }

    public function ajaxTable(Request $r,$kriterium, BobotKriteriaDataTable $datatable)
    {
        if ($r->ajax()) {
            $bobotKriteria = BobotKriteria::where('kriteria_id',$kriterium);
            return $datatable->dataTable($bobotKriteria);
        }
    }

    public function create()
    {
        $title = "Tambah Data Kriteria {$this->kriteria->kriteria_keterangan}";
        return view('dashboard.bobot-kriteria.create', compact('title'));
    }

    public function edit($kriterium, $bobot_kriterium)
    {
        $title = "Edit Data Kriteria {$this->kriteria->kriteria_keterangan}";
        $bobotKriteria = $this->kriteria->bobotkriteria->findOrFail($bobot_kriterium);
        return view('dashboard.bobot-kriteria.edit', compact('bobotKriteria', 'title'));
    }

    public function store(BobotKriteriaStoreRequest $request)
    {
        $data = $request->validated();
        $newBobotKriteria = $this->kriteria->bobotkriteria()->create($data);
        if ($newBobotKriteria) {
            return redirect()->route('kriteria.bobot-kriteria.create', ['kriterium' => $this->kriteria->id])->with('message', 'Berhasil Tambah Data');
        } else {
            return redirect()->route('kriteria.bobot-kriteria.create', ['kriterium' => $this->kriteria->id])->with('message', 'Gagal Tambah Data');
        }
    }

    public function update(BobotKriteriaUpdateRequest $request, $kriterium, $bobot_kriterium)
    {
        $data = $request->validated();
        $bobotKriteria = $this->kriteria->bobotkriteria->find($bobot_kriterium);
        if ($bobotKriteria) {
            $updateBobotKriteria = $bobotKriteria->update($data);
            if ($updateBobotKriteria) {
                return redirect()->route('kriteria.bobot-kriteria.edit', ['kriterium' => $this->kriteria->id, 'bobot_kriterium' => $bobot_kriterium])->with('message', 'Berhasil Update Data');
            }
        }
        return redirect()->route('kriteria.bobot-kriteria.edit', ['kriterium' => $this->kriteria->id, 'bobot_kriterium' => $bobot_kriterium])->with('message', 'Gagal Update Data');
    }

    public function destroy($bobot_kriterium)
    {
        $bobotKriteriaDelete = $this->kriteria->bobotkriteria->where('id',$bobot_kriterium)->firstOrFail();
        $bobotKriteriaDelete->delete();
        return response()->jsonApi(200, 'OK');
    }
}
