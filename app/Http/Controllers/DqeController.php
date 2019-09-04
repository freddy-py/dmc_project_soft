<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class DqeController extends Controller
{
    //middleware pour authentification avant d'avoir accés  a la page d'acceuil

            public function __construct() {
                $this->middleware('auth');
            }

    public function index(){

        $dao = DB::table('dao')->select('dao.*')->get();
       
        return view('admin.dqe.index',compact('dao'));
    }


    public function detail($id){

        $dao = DB::table('dao')->select('dao.*')->get()->where('DaoID',$id)->first();

        $lot = DB::table('lot')
                ->join('dao','lot.daoID','=','dao.DaoID')
                ->select('dao.*','lot.*')
                ->get()
                ->where('DaoID',$id); 



                $TotalParEntreprise = DB::table('Parametrage_Modele_DQE')->select('Parametrage_Modele_DQE.*')->where('Parametrage_Modele_DQE.lotID',$id)
                                ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
                                ->join('entreprise','DQE.entrepriseID','=','entreprise.entrepriseID')
                                ->addSelect('entreprise.RaisonSocial', DB::raw('SUM(DQE.Mont_HT) as total'))
                                ->groupBy('entreprise.raisonSocial')
                                ->get();
                    
        return view('admin.dqe.detail',compact('dao','lot','TotalParEntreprise'));     

                 
    }


     public function resultatDqe ($id){

       

        $lot = DB::table('lot')
                ->join('dao','lot.daoID','=','dao.DaoID')
                ->select('dao.*','lot.*')
                ->get()
                ->where('lotID',$id)
                ->first(); 

        $parmParLot = DB::table('Parametrage_Modele_DQE')->select('Parametrage_Modele_DQE.*')->where('Parametrage_Modele_DQE.lotID',$id)
        ->join('lot','Parametrage_Modele_DQE.lotID','=','lot.lotID')
        ->addSelect('lot.libelle')
        ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
        ->addSelect('DQE.EstRetenu')
        ->join('entreprise','DQE.entrepriseID','=','entreprise.entrepriseID')
        ->addSelect('entreprise.RaisonSocial', DB::raw('SUM(DQE.Mont_HT) as total'))
        ->groupBy('entreprise.raisonSocial')
        ->orderBy('total','asc')
        ->get();

        $moyennneTotalParLot = $parmParLot->avg('total');
        $plusVingt  = $moyennneTotalParLot + ($moyennneTotalParLot * 0.2);
        $moinsVingt = $moyennneTotalParLot - ($moyennneTotalParLot * 0.2);

       // dd($plusVingt);
       // dd($moyennne);
       // dd($parmParLot);


       //requete pour afficher les prix_unitaire par moyen

       $prixMoyenUnitaire = DB::table('Parametrage_Modele_DQE')
                                 ->join('lot','Parametrage_Modele_DQE.lotID','=','lot.lotID')
                                 ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
                                 ->join('ligne_sous_section','Parametrage_Modele_DQE.IdLigne_Sous_section','=','ligne_sous_section.IdLigne_Sous_section')
                                 ->Select('ligne_sous_section.Libelle_sous_section',DB::raw('AVG(DQE.Prix_Unitaire) as PrixMoyen'))
                                 ->groupBy('ligne_sous_section.Libelle_sous_section')
                                 ->where('lot.lotID',$id)
                                 ->paginate(15);
                                 
                                 

        //dd($prixMoyenUnitaire);

       return view('admin.dqe.resultat',compact('parmParLot','lot','moyennneTotalParLot','prixMoyenUnitaire','plusVingt','moinsVingt'));
     }





     public function analyseDQE($libelle,$entreprise){

        $libEntreprise = DB::table('entreprise')->select('entreprise.raisonSocial')->where('entreprise.raisonSocial',$entreprise)->get()->first();

        $libLot = DB::table('lot')->select('lot.libelle')->where('lot.libelle',$libelle)->get()->first();


//total par section

        $TotalParSection = DB::table('Parametrage_Modele_DQE')->select('Parametrage_Modele_DQE.IdParamModeleDQE')
        ->join('lot','Parametrage_Modele_DQE.lotID','=','lot.lotID')
        ->where('lot.libelle',$libelle)
        ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
        ->addSelect('DQE.*')
        ->join('entreprise','DQE.entrepriseID','entreprise.entrepriseID')
        ->addSelect('entreprise.raisonSocial')
        ->join('ligne_sous_section','Parametrage_Modele_DQE.IdLigne_Sous_section','=','ligne_sous_section.IdLigne_Sous_section')
        ->join('sous_section','ligne_sous_section.IdSous_Section', '=', 'sous_section.IdSous_Section')
        ->join('section','sous_section.IdSection','=','section.IdSection')
        ->addSelect('section.Libelle_section',DB::raw('SUM(DQE.Mont_HT) as Total'))
        ->groupby('section.Libelle_section')
        ->where('entreprise.raisonSocial',$entreprise)
        ->get();

        //dd($TotalParSection);
         
       //dd($sumMontTotal);



       //requete analyse par lot
       $analyseParLot = DB::table('Parametrage_Modele_DQE')->select('Parametrage_Modele_DQE.*')
       ->join('lot','Parametrage_Modele_DQE.lotID','=','lot.lotID')
       ->where('lot.libelle',$libelle)
       ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
       ->addSelect('DQE.*')
       ->join('entreprise','DQE.entrepriseID','entreprise.entrepriseID')
       ->addSelect('entreprise.raisonSocial')
       ->join('ligne_sous_section','Parametrage_Modele_DQE.IdLigne_Sous_section','=','ligne_sous_section.IdLigne_Sous_section')
       ->addSelect('ligne_sous_section.Libelle_sous_section')
       ->where('entreprise.raisonSocial',$entreprise)
       ->get();

       //montant total
       $sumMontTotal = $analyseParLot->sum('Mont_HT');

        return view('admin.dqe.analyse',compact('analyseParLot','sumMontTotal','libEntreprise','libLot','TotalParSection'));
     }


//attribuer une  DQE A UNE ENTREPRISE

     public function Retenu($entreprise) {
         //requete analyse par lot
       $analyseParLot = DB::table('Parametrage_Modele_DQE')->select('Parametrage_Modele_DQE.*')
       ->join('lot','Parametrage_Modele_DQE.lotID','=','lot.lotID')
       ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
       ->addSelect('DQE.*')
       ->join('entreprise','DQE.entrepriseID','entreprise.entrepriseID')
       ->addSelect('entreprise.raisonSocial')
       ->join('ligne_sous_section','Parametrage_Modele_DQE.IdLigne_Sous_section','=','ligne_sous_section.IdLigne_Sous_section')
       ->addSelect('ligne_sous_section.Libelle_sous_section')
       ->where('entreprise.raisonSocial',$entreprise)
       ->update(['DQE.EstRetenu' => 1]);


      //dd($analyseParLot->EstRetenu);

        return redirect()->back();

     }



     //CHANGER D attributaire   DQE A UNE ENTREPRISE

     public function NonRetenu($entreprise) {
        //requete analyse par lot
      $analyseParLot = DB::table('Parametrage_Modele_DQE')->select('Parametrage_Modele_DQE.*')
      ->join('lot','Parametrage_Modele_DQE.lotID','=','lot.lotID')
      ->join('DQE','Parametrage_Modele_DQE.IdParamModeleDQE','=','DQE.IdParamModeleDQE')
      ->addSelect('DQE.*')
      ->join('entreprise','DQE.entrepriseID','entreprise.entrepriseID')
      ->addSelect('entreprise.raisonSocial')
      ->join('ligne_sous_section','Parametrage_Modele_DQE.IdLigne_Sous_section','=','ligne_sous_section.IdLigne_Sous_section')
      ->addSelect('ligne_sous_section.Libelle_sous_section')
      ->where('entreprise.raisonSocial',$entreprise)
      ->update(['DQE.EstRetenu' => 0]);


     //dd($analyseParLot->EstRetenu);

       return redirect()->back();

    }





}
