@extends('layouts.app')
@section('content')
<div class="row  ">
        <div class="col-xl-12 col-sm-12 m-auto">
          <div class="card p-4 mt-5">
                                <div class="card-header text-light text-center" style="background-color: #EA7207
                                ">
                                        <span > {{$selectionProjet->libelle}}</span>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered text-center table-sm table-responsivex">
                                               
                                            <tr class="text-dark">
                                                <td rowspan="{{$projet_unique->count()+2}} "  class="text-center bailleur text-dark">
                                                        Bailleur
                                                </td>
                                            </tr> 
                                            <tr>   
                                                    <th class="bailleur">Nom</th>
                                                    <th class="bailleur">Financement</th>
                                                    <th class="bailleur">Montant</th>
                                                    <th class="bailleur">% / Bailleur</th>
                                                @foreach ($projet_unique as $info)
                                                <tr>
                                                    <td >{{$info->bailleur}} </td>
                                                    <td>{{$info->accord}}</td>
                                                    <td>{{number_format($info->Montant,0,',','.')}} fcfa</td>
                                                    <td>{{($info->Montant *100) / $sommeBailleur }} </td>
                                                </tr>
                                                @endforeach
                                            </tr>
                                            <tr class="text-dark">
                                                    <td rowspan="{{$prestation->count()+1}} "  class="text-center text-dark" style="background-color:lightblue">
                                                      type  Prestation
                                                        <th colspan="2"  style="background-color:lightblue">Libelle</th>
                                                        <th colspan="2"  style="background-color:lightblue">Responsable</th>
                                                    </td>
                                                    @foreach ($prestation as $info)
                                                    <tr>
                                                        <td colspan="2">{{$info->Libelle}}</td>  
                                                        <td colspan="2">{{$info->nom}}</td> 
                                                    </tr>
                                                    @endforeach
                                            </tr>
                                        </table>
                                </div>
                        </div>
                                </div>
                        
                        
                 </div>   
            
      
@endsection