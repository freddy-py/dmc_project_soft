<?php

namespace App\Http\Controllers;
use ConsoleTVs\Charts\Classes\Echarts\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       
        return view('home');
    }


    public function login()
    {
        $bailleurs = DB::table('bailleur')
        ->get();
        $projets = DB::table('projet')
        ->get();
        return view('home',compact('bailleurs','projets'));
    }
}
