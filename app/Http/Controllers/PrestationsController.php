<?php

namespace App\Http\Controllers;
use Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Charts\grapheUser;

class PrestationsController extends Controller
{

    public function __construct() {
        $this->middleware('auth');
    }
    //requetes pour lister les differentes prestations 
    public function index(){
        $listPrestation = DB::table('Prestation')
                                 ->select('Prestation.*')
                                 ->paginate(5);
                                
       
        //dd($listPrestation);

        //requetes pour faire le graphe de passation de marchés par dp dao
        $pres1 = DB::table('Prestation')
        ->where('statut','=',2)->count();
       
        $pres = DB::table('Prestation')
         ->where('statut','=',1)->count();
       
        
        $chart = new grapheUser;
        $chart->labels(['Prestation passée par DAO', 'Prestation parssée par DP']);
        $chart->dataset('PRESTAION PAR DP / DAO', 'pie', [$pres,$pres1])->backgroundColor(collect(['yellow','blue']));
        $chart->height(200); 
          return view('admin.prestations.index',compact('listPrestation','chart'));
    }

    //requetes pour afficher les detail d'une prestations
    public function show($id){
        $prestation = DB::table('accord_projet')
                            ->join('Prestation','accord_projet.IdPrestation','=','Prestation.IdPrestation')
                            ->join('accord','accord_projet.accordID','=','accord.accordID')
                            ->join('bailleur','accord_projet.bailleurID','=','bailleur.bailleurID')
                            ->select('accord_projet.*','accord.libelle as accord','bailleur.libelle as bailleur','Prestation.*')
                            ->get()
                            ->where('IdPrestation',$id);

                           // dd($prestation);
        $somme =0;
        foreach($prestation as $prest){
            if($prest->Montant) {
                $somme+=$prest->Montant;
            }
        }   
        
       
       
       

                            //
                            $lot = DB::table('lot')
                                        ->join('dao','lot.daoID','=','dao.daoID')
                                        ->join('Prestation','dao.IdPrestation','=','Prestation.IdPrestation')
                                        ->select('lot.*','dao.numDAO as numero','Prestation.*')
                                        ->get()
                                        ->where('IdPrestation',$id);

                                    // dd($lot);   
                                     $selectionPrestation = DB:: Table('Prestation')
                                     ->select('Prestation.*')
                                     ->get()
                                     ->where('IdPrestation',$id)->first();
                                    // dd($selectionPrestation);



                                          

                
                                    
                     return view('admin.prestations.show',compact('prestation','lot','selectionPrestation','somme',));                
    }
}
