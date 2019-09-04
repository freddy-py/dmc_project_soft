<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BailleursController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }


    public function index(){
        $bailleurs = DB::table('bailleur')->select('bailleur.*')
                        ->get();

        //dd($bailleurs);
        
       
                            // dd($infoParBailleur);   
                             //graphe montrant nombre de prestaion par bailleur

                        
    return view('admin.bailleurs.index', compact('bailleurs'));
    }

    public function financement($libelle){

        $infoParBailleur = DB::table('accord_projet',)
                             ->join('accord','accord_projet.accordID','=','accord.accordID')
                             ->join('bailleur','accord_projet.bailleurID','=','bailleur.bailleurID')
                             ->join('Prestation','accord_projet.IdPrestation','=','Prestation.IdPrestation')
                             ->select('accord_projet.*','accord.libelle as accord','bailleur.libelle as bailleur','Prestation.Libelle as Prestation','Prestation.ProjetID','bailleur.bailleurID')
                             ->get()
                             ->where('bailleur',$libelle);

         //  dd($infoParBailleur);

                             $bailleur = DB::table('bailleur')->select('bailleur.*')
                             ->get()
                             ->where('libelle',$libelle)
                             ->first();
           // dd($bailleur);
                             return view('admin.bailleurs.financement',compact('infoParBailleur','bailleur'));
    }


   
        
}