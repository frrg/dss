<?php

namespace App\Http\Controllers;

use App\DataTables\KriteriaDataTable;
use App\Models\KriteriaM;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    public function index(KriteriaDataTable $datatable)
    {
        $title = 'Data Kriteria';
        return view('dashboard.kriteria.index',compact('datatable','title'));
    }

    public function ajaxTable(Request $r,KriteriaDataTable $datatable)
    {
        if($r->ajax()){
            $kriteria = KriteriaM::query();
            return $datatable->dataTable($kriteria);
        }
    }

    public function edit()
    {
        // 
    }

    public function store()
    {
        // 
    }

    public function update()
    {
        // 
    }

    public function destroy()
    {
        // 
    }
}
