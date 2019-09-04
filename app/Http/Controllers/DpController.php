<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Storage;
use Response;
class DpController extends Controller
{


    public function __construct() {
        $this->middleware('auth');
    }

    
    public function index(){
        $listdp =DB::table('dp')
                    ->join('Prestation','dp.IdPrestation','=','Prestation.IdPrestation')
                    ->join('evennement','dp.IdPrestation','=','evennement.IdPrestation')
                    ->select('dp.*', 'Prestation.Libelle as Prestations','evennement.nomDocument as document','evennement.DocAssocie as chemin')
                    ->get();
                   // dd($listdp);
                    return view('admin.dp.index',compact('listdp'));
    }

    public function show($id){

        $ListEntrepriseAchat = DB::table('achatdp')
                            ->join('dp','achatdp.DPID', '=', 'dp.dPID')
                            ->join('entreprise','achatdp.entrepriseID', '=','entreprise.EntrepriseID')
                            ->select('achatdp.*','entreprise.raisonSocial as Entreprise','achatdp.date as dates')
                            ->get()
                            ->where('DPID',$id);
  
                           //dd($ListEntrepriseAchat);
  
  
                $listDepot = DB::table('depotdp','achatdp')
                           ->join('achatdp','depotdp.achatDPID','=','achatdp.achatDPID')
                           ->join('entreprise','achatdp.EntrepriseID','=','entreprise.entrepriseID')
                           ->select('depotdp.*','achatdp.*','entreprise.*')
                           ->get()
                           ->where('DPID',$id);
                          // dd($listDepot);
               $infodp = DB::table('dp')->select('dp.*')->get()->where('dPID',$id)->first();                  
  
        return view('admin/dP/detail',compact('ListEntrepriseAchat','listDepot', 'infodp'));
  
  
  
        
      }
  
  
}
