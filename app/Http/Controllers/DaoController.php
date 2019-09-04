<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DaoController extends Controller
{


  public function __construct() {
    $this->middleware('auth');
}
    public function index(){
        $listdao =DB::table('dao')->orderBy('DateSaisie','DESC')
                    ->join('Prestation','dao.Idprestation','=','Prestation.IdPrestation')
                    ->select('dao.*', 'Prestation.Libelle as Prestations')
                    ->get();
                  //  dd($listdao);
                    return view('admin.dao.index',compact('listdao'));
                  
    }

    public function show($id){

      $ListEntrepriseAchat = DB::table('achatdao')
                          ->join('dao','achatdao.DaoID', '=', 'dao.DaoID')
                          ->join('entreprise','achatdao.EntrepriseID', '=','entreprise.EntrepriseID')
                          ->select('achatdao.*','entreprise.raisonSocial as Entreprise','dao.numDAO as numero DAO','achatdao.date as dates')
                          ->get()
                          ->where('DaoID',$id);

                         //dd($EntrepriseAchat);


              $listDepot = DB::table('depotdao','achatdao')
                         ->join('achatdao','depotdao.achatDAOID','=','achatdao.achatDAOID')
                         ->join('entreprise','achatdao.EntrepriseID','=','entreprise.entrepriseID')
                         ->select('depotdao.*','achatdao.*','entreprise.*')
                         ->get()
                         ->where('DaoID',$id);
                        // dd($listDepot);

                        $infodao = DB::table('dao')->select('dao.*')->get()->where('DaoID',$id)->first();             
                   // dd($infodao->libelle);
      return view('admin/dao/detail',compact('ListEntrepriseAchat','listDepot','infodao'));



      
    }


    // SELECT entreprise.raisonSocial, depotdao.date FROM depotdao,achatdao,entreprise WHERE depotdao.achatDAOID = achatdao.achatDAOID AND achatdao.EntrepriseID = entreprise.entrepriseID AND IdDAO



}
