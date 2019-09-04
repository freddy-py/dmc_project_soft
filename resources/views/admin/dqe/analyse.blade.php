@extends('layouts.app')
@section('content')

   <div class="card mt-5 m-5">
      <div class="card-header  text-light text-center" style="background-color: #EA7207">
              ANALYSE DQE POUR LE <span style="color: #15487F">{{$libLot->libelle}}</span>  DE L'ENTREPRISE <span style="color:#15487F">{{$libEntreprise->raisonSocial}} </span>
      </div>
                                        
      <div class="card-body">

      <table class="table table-bordered table-sm">
          <thead style="background-color: #15487F" class="text-light">
              <th>Libelle Prix</th>
              <th>Prix Unitaire (fcfa)</th>
              <th>Qantité</th>
              <th>Montant HT (fcfa)</th>
          </thead>
          @foreach ($analyseParLot as $calcul)
              
          <tr>
              <td>{{$calcul->Libelle_sous_section}}</td>
              <td class="text-right" style="font-weight: bold">{{number_format($calcul->Prix_Unitaire,0,',','.')}} </td>
              <td class="text-right" style="font-weight: bold">{{$calcul->Qte}} </td>
              <td class="text-right" style="font-weight: bold">{{number_format($calcul->Mont_HT,0,',','.')}} </td>
          </tr>
                                               
         @endforeach
     </table>

                                        <div class="card p-3 bg-light">
                                            <div class="card-header text-center " style="background-color: #EA7207">
                                                <h5>Total par section</h5>
                                            </div>
                                            <div class="card-body">
                                                <table class="table table-bordered table-sm">
                                                        <thead  style="background-color: #15487F" class="text-light">
                                                            <th>Sections</th>
                                                            <th>Total en fcfa</th>
                                                        </thead>
                                                        @foreach ($TotalParSection as $section)
                                                        <tr>
                                                            <td>{{$section->Libelle_section}}</td>
                                                        <td class="text-right font-weight-bold font-italic">{{number_format($section->Total,0,',','.')}}</td>
                                                        </tr>         
                                                        @endforeach
                                                    
                                                </table>
                                            </div>
                                        </div>


                                        <div class="card text-right p-2 text-light  m-5" style="background-color: #15487F
                                        "> <h4>Montant Total: <span class="text-danger font-weight-bold font-italic">{{number_format($sumMontTotal,0,',','.')}}</span> fcfa </h4></div>
                                    </div>
  </div>       
   
@endsection