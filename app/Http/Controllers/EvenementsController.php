<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class EvenementsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        $listPrestation = DB::table('Prestation')
                            ->select('Prestation.*')
                            ->get();
                           
        //dd($listPrestation);


        $evenement = DB::table('evennement')
                            ->join('Action','evennement.IdAction','=','Action.IdAction')
                            ->join('Prestation','evennement.IdPrestation','=','Prestation.IdPrestation')
                            ->select('evennement.*','Prestation.Libelle as Prestation','Action.*')  
                            ->get();
    


 $groupedbyIdPrestation =$evenement->groupBy('IdPrestation');
    $i=0;
    $groupedbyLibellePrestation = $evenement->groupBy('Prestation');
       // dd($groupedbyLibellePrestation);

    return view('admin.evenements.index',compact('evenement','listPrestation','groupedbyIdPrestation','groupedbyLibellePrestation','i'));
    }


    
}
