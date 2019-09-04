@extends('layouts.app')

@section('content')

                        <div class="card m-5 ">
                            <div class="card-header text-center text-light" style="background-color:#EA7207
                            ">
                                Liste des Prestations
                            </div>
                            <div class="card-bdoy">
                                    <table class="table table-bordered  text-center table-sm">
                                            <thead style="background-color: #15487F
                                            ">
                                                <tr class="text-light">
                                                    <th>Numéro</th>
                                                    <th> Prestations</th>
                                                    <th>Localisation</th>
                                                    <th>detail</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listPrestation as $projet )
                                                <tr>
                                                    <td>{{$projet->NumPrestation}}</td>
                                                    <td>{{$projet->Libelle}}</td>
                                                    <td>{{$projet->Localisation}}</td>
                                                <td><a href="{{route('prestation.detail',['id'=>$projet->IdPrestation])}}"><i class="far fa-eye text-primary"></i></a></td>
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                        
                        
                        <!--  pagination-->
                        <nav>
                            <ul class="pagination justify-content-center">
                               {{ $listPrestation->links() }}
                            </ul>
                        </nav>
                       
                        <!-- end of  pagination-->
                    </div>
                    {{-- <div class="container mt-3 bg-light m-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header text-light text-center" style="background-color: #EA7207
                                        ">Graphe des prestations par dp / dao</div>
                        
                                        <div class="card-body">
                                                {!! $chart->container() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        {{-- {!! $chart->script() !!} --}}
                    
           
   
@endsection