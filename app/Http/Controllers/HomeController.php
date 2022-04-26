<?php

namespace App\Http\Controllers;

use App\Models\KriteriaM;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';
        $jmlPelamar = Pelamar::count();
        $jmlKriteria = KriteriaM::count();
        return view('home',compact('title','jmlPelamar','jmlKriteria'));
    }
}
