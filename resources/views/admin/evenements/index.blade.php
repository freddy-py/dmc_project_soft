@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
        <div class="row pt-md-5 mt-md-3 mb-3">
            <div class="col-xl-12 col-sm-12 p-2">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header " style="background-color:#EA7207">
                                <h5 class="text-light text-center">
                               listes des événements par prestation
                            </h4>
                            </div>
                            <div class="card-body">
                                    <div id="accordion">
                                            <?php
                                            $i = 0;
                                            ?>
                                            @foreach ($groupedbyLibellePrestation as $event => $listEvent )   
                                        <div class="card">
                                            <div class="card-header">
                                              
                                                
                                                <button class="btn btn-block bg-secondary text-light text-left " data-toggle="collapse" data-target="#<?php echo $i ?>">
                                                        {{str_limit($event,35)}}
                                                </button>
                                            </div>
                                         
                                             <div class="collapse" id="<?php echo $i ?>" data-parent="#accordion">
                                                 <div class="card-body">
                                                      
                                                        <div class="row card-header">
                                                            <div class="col-sm-2">Date d'envoi</div>
                                                            <div class="col-sm-2">Expediteur</div>
                                                            <div class="col-sm-4">Evénement</div>
                                                            <div class="col-sm-2">Recepteur</div>
                                                           
                                                        </div>
                                                        @foreach ($listEvent as $item)
                                                        
                                                        <div class="row">
                                                            <div class="col-sm-2"><span class="badge badge-primary ml-3">{{date('d-m-Y',strtotime($item->DateEv))}}</span></div>
                                                            <div class="col-sm-2"><span class=" ml-3">{{$item->Expediteur}}</span></div>
                                                            <div class="col-sm-4"><span  class="badge badge-dark">{{$item->LibAction}}</span></div>
                                                            <div class="col-sm-2"><span>{{$item->Recepteur}}</span></div>
                                                            <div class="col-sm-2">
                                                                @if (($item->AccordANO == 1) && ($item->ActionANO == 1))
                                                                <span class="badge badge-success">ANO accordé</span>
                                                                @endif                                                
                                                                @if (($item->AccordANO == 0) && ($item->ActionANO == 1))
                                                                <span class="badge badge-danger">ANO non accordé</span>
                                                                @endif
                                                                @if (($item->AccordANO == 1) && ($item->ActionANO == 0))
                                                                <span class="badge badge-danger"></span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        
                                                    
                                                        @endforeach
                                            </div>
                                            <?php
                                            $i++
                                        ?>
                                    </div>
                                           
                                            @endforeach
                             </div>       
                         </div>
                            </div>
                        </div>
                           
                      
        </div> 
    </div>      
</div>   
</div>  
@endsection