@extends('layouts.app')
@section('content')

    <div class="card  p-2 mt-5">
                            <div class="card-header mb-3" style="background-color: #EA7207 ">
                                <h6 class="text-light mb-2 text-center">
                               Listes des bailleurs et leurs financements
                            </h6>
                            </div>
                            
                            <div class="card-body">
                                    <table class="table table-bordered  text-center table-sm small">
                                        <thead  style="background-color: #16477F">
                                            <tr class="text-light">
                                                <th>logo</th>
                                                <th>Nom bailleurs</th>
                                                <th>Financements</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($bailleurs as $bailleur )
                                            <tr>
                                                <td><img src="{{$bailleur->logo}}" alt="logo {{$bailleur->logo}}" width="50" height="50"></td>
                                                <td>{{$bailleur->libelle}}</td>
                                                <td><a href="{{route('bailleur.financement',['libelle'=>$bailleur->libelle])}} "><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach 
                                        </tbody>
                                    </table>
                                </div> 
        </div> 
@endsection