@extends('layouts.app')
@section('content')

                <div class="card mt-5 m-5">
                                <div class="card-header text-center  text-light " style="background-color: #EA7207
                                ">
                                <span>Resultats DQE : </span>{{$dao->libelle}}
                                </div> 
                               
                                
                                <div class="card-body text-center">
                                        @if ($lot->count()==0)
                                        <div class="card-header bg-danger text-center text-light">
                                            Pas de lot pour ce DAO
                                        </div>
                                         @endif
                                     @foreach ($lot as $item)
                                     <button type="button" class="btn btn-outline-warning "> <a href="{{route('dqe.resultat',['id'=>$item->lotID])}} " > {{$item->libelle}}</a></button>
                                    @endforeach
                                </div>

             </div> 
                        
@endsection