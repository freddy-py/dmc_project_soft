@extends('layouts.app')
@section('content')

<div class="row  ">
                           
    <div class="col-xl-12 col-sm-12 m-auto">

            <div class="card  p-2 mt-5">
                     <div class="card-header mb-3" style="background-color: #EA7207 ">
                        
                            <h6 class="text-light mb-2 text-center">
                                    <img src="{{$bailleur->logo}}" alt="" width="50" height="50">  {{$bailleur->libelle}}
                            </h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-sm">
                                <thead class="small text-light text-center"  style="background-color: #16477F">
                                    <th>Prestations</th>
                                    <th>Type d'Accord</th>
                                    <th>Montant financé</th>
                                </thead>
                            @foreach ($infoParBailleur as $fin)
                                <tr class="small">
                                    <td>{{$fin->Prestation}}</td>
                                    <td>{{$fin->accord}}</td>
                                    <td><span class="float-right font-italic">{{number_format($fin->Montant,0,',','.')}} fcfa</span></td>
                            </tr>
                            @endforeach
                            
                        </table>
                    </div> 
            </div>      


    </div>
</div>

@endsection
