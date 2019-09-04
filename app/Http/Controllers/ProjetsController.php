<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
class ProjetsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index(){
        $listProjet = DB::Table('projet')
        ->select('projet.*')
        ->paginate(4);
        
        

        $bailleurs = DB::Table('bailleur')
        ->get();

        $prestations = DB::Table('Prestation')
        ->get();
       // dd($listProjet);
        return view('admin.projets.projet', compact('listProjet','bailleurs','prestations'));
    }

    public function projetUnique($id){
        $projet_unique = DB::table('accord_projet','projet')
                             ->join('accord','accord_projet.accordID','=','accord.accordID')
                             ->join('bailleur','accord_projet.bailleurID','=','bailleur.bailleurID')
                             ->join('Prestation','accord_projet.IdPrestation','=','Prestation.IdPrestation')
                             ->select('accord_projet.*','accord.libelle as accord','bailleur.libelle as bailleur','Prestation.Libelle as prestation','Prestation.ProjetID')
                             ->get()
                             ->where('ProjetID',$id);
                            
           //dd($projet_unique);
           $sommeBailleur =0;
           foreach($projet_unique as $argent){
               if($argent->Montant) {
                   $sommeBailleur += $argent->Montant;
               }
           } 
          // dd($somme);
         $prestation = DB::table('Prestation')
                       ->join('projet','Prestation.projetID','=','projet.projetID')
                       ->join('responsable','Prestation.IdResponsable','=','responsable.IdResponsable')
                        ->select('Prestation.*','responsable.nom')
                        ->get()
                        ->where('projetID',$id);
    
         //dd($prestation);
       
         $selectionProjet = DB:: Table('projet')
         ->select('projet.*')
         ->get()
         ->where('projetID',$id)->first();
        // dd($selectionProjet);
        return view('admin.projets.uniqueProjet',compact('projet_unique','prestation','selectionProjet','sommeBailleur'));
    }


    

   
}
