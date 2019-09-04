@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row pt-md-5 mt-md-3 mb-3">
            <div class="col-xl-12 col-sm-6 p-2">
                    <div class="col-xl-12">
                        <div class="row">

                        <div class="col-xl-9">
                                @if($parmParLot->count()==0)
                                <div class="card-body bg-danger text-center text-light">
                                    LE {{$lot->libelle}} N'A PAS ENCORE ETE ANALYSE
                                </div>
                                @else
                                <div class="card">
                        
                                        <div class="card-header  text-center text-light"  style="background-color: #EA7207">
                                            Resutats DQE POUR LE {{$lot->libelle}}
                                        </div>
                                        <div class="card-body">

                                            <table class="table table-bordered table-sm">
                                                <thead class=" text-light"  style="background-color: #15487F"
                                                >
                                                    <th>Nom de l'Entreprise</th>
                                                    <th>Montant total HT</th>
                                                    <th>detail/prix</th>
                                                </thead>
                                                @foreach ($parmParLot as $calcul)
                                                <tr>
                                                    <td>{{$calcul->RaisonSocial}}</td>
                                                    @if (($calcul->total >= $moinsVingt) && ($calcul->total <= $plusVingt) )
                                                    <td class="text-right bg-success text-light" style="font-weight: bold">{{number_format($calcul->total,0,',','.')}} <span> fcfa</span></td>
                                                    @else
                                                    <td class="text-right" style="font-weight: bold">{{number_format($calcul->total,0,',','.')}} <span> fcfa</span></td>
                                                    @endif
                                                   
                                                    <td><a href="{{route('dqe.analyse.entreprise',['libelle'=>$lot->libelle,'entreprise'=>$calcul->RaisonSocial])}}">analyse DQE</a></td>
                                                    
                                                    
                                                    @if($calcul->EstRetenu ==0 )
                                                    <td> <a href="{{route('dqe.retenu',['entreprise'=>$calcul->RaisonSocial])}}"          class="btn btn-outline-secondary">Attribuer</a></td>
                                                    @else
                                                    <td> <a href="{{route('dqe.nonretenu',['entreprise'=>$calcul->RaisonSocial])}}"          class="btn btn-outline-light bg-success">Attribué</a></td>
                                                    @endif
                                                </tr>
                                                @endforeach
                                            </table>

                                        </div>
                                    </div>      
                        </div>
                        <div class="col-xl-3">
                                <div class="card card-common">
                                    <div class="card-header bg-warning small">
                                        Moyenne des Montants totaux 
                                    </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">  
                                                <div class="text-right text-success">
                                                       <h5>{{number_format($moyennneTotalParLot,0,',','.')}} <span>fcfa</span></h5> 
                                                  
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                        </div>
                    </div>     
                    @endif
                    </div> 
                    @if($prixMoyenUnitaire->count()>0)
                    <div class="card p-3 m-4">
                        <div class="card-header  text-center text-light" style="background-color: #EA7207
                        ">
                            Prix Moyen / prix Unitaire
                        </div>
                        <div class="card-body w-80">
                            <table class="table table-bordered table-sm">
                                <tr>
                                    <thead class=" p-2 text-light" style="background-color: #15487F
                                    "
                                    >
                                         <th> libelle prix</th>
                                         <th>prix moyen (fcfa) </th>
                                    </thead>
                                   
                                </tr>
                                @foreach ($prixMoyenUnitaire as $prixMoyen)
                                <tr>
                                    <td class="text-sm-left text-lowercase">{{$prixMoyen->Libelle_sous_section}}</td>
                                    <td class="text-sm-right">{{number_format($prixMoyen->PrixMoyen,0,',','.')}}</td>
                                    <td></td>
                                </tr>    
                                @endforeach
                            
                              
                            </table>
                            
                        <!--  pagination-->
                        <nav>
                                <ul class="pagination justify-content-center">
                                   {{ $prixMoyenUnitaire->links() }}
                                </ul>
                            </nav>
                           
                            <!-- end of  pagination-->
                        </div>
                    </div>
                   @endif 
            </div> 
       </div> 
    </div>         
</div> 


