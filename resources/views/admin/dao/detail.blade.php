@extends('layouts.app')
@section('content')
                <div class="card mt-5  p-3">
                        <div class="card-header text-center  text-light" style="background-color:#EA7207
                        ">
                        <span>Prestation: </span>{{$infodao->libelle}}
                        </div>
                        <div class="card-body">
                            <div class="float-left"> <span><i class="fas fa-barcode" style="color:blueviolet; font-weight: 900; font-size: 30px;"></i> </span> <span>{{$infodao->numDAO}}</span></div>
                            <div class="float-right">
                                    <i class="fas fa-hand-holding-usd" style="color:blueviolet; font-weight: 900; font-size: 30px;"></i>Prix:  <span  style="font-weight: bold; color:blue">{{ number_format($infodao->Prixdao, 0, ',', '.') }} fcfa</span>
                            </div>     
                    </div> 
                </div>
            <div class="row pt-md-5  mb-3">
    
                <div class="col-xs-6 col-sm-5 m-auto p-3">
                   @if ($ListEntrepriseAchat->count()==0 && $listDepot->count()==0)
                   <div class="card-header">
                       
                        <i class="fas fa-exclamation-triangle fa-5x text-danger text-center"></i><p style="font-style:italic; font-size: 30px; font-weight: bold; color:red">aucun achat pour ce dao</p> 
                   
                   </div>
                   
                  @else
                   <div class="card-header text-light " style="background-color:#EA7207
                   ">
                        <h5>les entreprises ayant achété ce DAO</h5>
                   </div>
                        @if($ListEntrepriseAchat->count()>0)
                        <table class="table table-striped table-sm table-bordered table-hover">
                                <thead class="table-info">
                                  <th>Raison Sociale </th>
                                    <th>Date Achat</th>
                                </thead>
                               <tbody class="table-light">
                                    @foreach ($ListEntrepriseAchat as $entreprise)
                                    <tr>
                                        <td >{{$entreprise->Entreprise}}</td>
                                        <td>{{date('d-m-Y',strtotime($entreprise->dates))}}</td>
                                    </tr>
                                     @endforeach
                               </tbody> 
                               
                              
                        </table>
                        @else
                        <div class="card-header">
                            <p class="table-danger">
                                    <i class="fas fa-exclamation-triangle fa-5x text-danger"></i> Pas d'entreprise ayant achété ce dao
                            </p>
                        </div>
                        @endif
                 </div> 
                     
                       
                 <div class="col-xs-6 col-sm-5 m-auto">
                     <div class="card-header  text-light" style="background-color:#EA7207
                     ">
                        <h5>les entreprises ayant déposés ce DAO</h5>
                    </div>   
                        @if($listDepot->count()>0)
                        <table class="table table-striped table-sm table-bordered table-hover">
                                <thead class="table-success">
                                  <th>Raison Sociale </th>
                                    <th>Date depôt</th>
                                </thead>
                               <tbody class="table-light">
                                    @foreach ($listDepot as $depot)
                                    <tr>
                                        <td >{{$depot->raisonSocial}}</td>
                                        <td>{{date('d-m-Y',strtotime($depot->date))}}</td>
                                    </tr>
                                     @endforeach
                               </tbody> 
                               
                              
                        </table>
                        @else 
                        <div>
                                <p class="table-danger">
                                        <i class="fas fa-exclamation-triangle fa-5x text-danger"></i> Pas d'entreprise ayant depot ce dao
                                </p>
                        </div>
                        @endif
                 </div>
                 @endif    
            </div>         
        </div>  


        {{--  --}}

        
    </div>  
</div>       
@endsection