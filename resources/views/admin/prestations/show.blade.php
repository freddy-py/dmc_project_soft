@extends('layouts.app')
@section('content')
                    <div class='card p-2 mt-5'>
                                <div class="card-header" style="background-color: #EA7207">
                                    <h3 class="text-light text-center text-uppercase">Information sur la prestation</h3>
                                </div>
                        
                         <div class="card-body">     
                            <table class="table table-light table-hover text-center table-responsive table-sm">
                            
                                    <th colspan="11" class="text-light" style="background-color:  #15487F"> {{$selectionPrestation->Libelle}} </th>
                                    <tr>
                                    <td colspan="10">Numéro de la Prestation</td><td>{{$selectionPrestation->NumPrestation}}</td>
                                    </tr>
                                    <tr><td colspan="10">Localisation</td> <td>{{$selectionPrestation->Localisation}}</td>
                                    </tr>
                                @if ($lot->count() > 0)
                                <tr class="text-muted">
                                        <td rowspan="{{$lot->count()+2}} "  class="text-center bailleur">
                                                Lot(s)
                                        </td>
                                    </tr> 
                                    <tr>   
                                            <th class="bailleur">Libelle</th>
                                            <th class="bailleur" colspan="7">Localisation</th>
                                            <th class="bailleur">Distances</th>
                                            <th class="bailleur">detail</th>
                                        @foreach ($lot as $info)
                                        <tr>
                                            <td >{{$info->libelle}} </td>
                                            <td colspan="7">{{$info->situGeo}}</td>
                                            <td>{{number_format($info->distance,0,',','.')}} KM </td>
                                            <td><a href=""><i class="far fa-eye text-primary"></i></a></td>

                                            {{-- {{ number_format($mobility->travelcosts, 2, ',', '.') }} --}}
                                        </tr>
                                        @endforeach
                                    </tr>
                                @endif
                                    <tr class="text-muted">
                                            <td rowspan="{{$prestation->count()+1}} "  class="text-center" style="background-color:lightblue">
                                            bailleur(s)
                                                <th colspan="3"  style="background-color:lightblue">Nom</th>
                                                <th colspan="3"  style="background-color:lightblue">financement</th>
                                                <th colspan="3"  style="background-color:lightblue">Montant</th>
                                                <th colspan="3"  style="background-color:lightblue"> % / bailleurs</th>
                                            </td>
                                            @foreach ($prestation as $info)
                                            <tr>
                                                <td colspan="3">{{$info->bailleur}}</td>  
                                                <td colspan="3">{{$info->accord}}</td> 
                                                <td colspan="3">{{number_format($info->Montant,0,',','.')}} fcfa</td>
                                                <td colspan="3">{{($info->Montant *100) / $somme}} </td>
                                            </tr>
                                            @endforeach
                                        </tr>
                                    <tr>
                                    
                                    </tr>

                                </table>
                            </div>        
                   <div>     
@endsection
