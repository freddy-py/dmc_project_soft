@extends('layouts.app')

@section('content')
                   <div class="card p-2 m-5">
                    <div class="card-header text-light" style="background-color: #EA7207">
                        <h3 class="text-center" >Liste des projets</h3>
                    </div>    
                    <div class="card-body">
                        <table class="table table-bordered  text-center table-sm">
                            <thead  style="background-color: #16477F">
                                <tr class="text-light">
                                    <th>Numéro</th>
                                    <th>libellé projet</th>
                                    <th>Details</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($listProjet as $projet )
                                <tr>
                                    <td>{{$projet->numIdentifProjet}}</td>
                                    <td>{{$projet->libelle}}</td>
                                    <td><a href="{{route('projets.uniqueProjet',$projet->projetID)}} "><i class="fas fa-eye"></i></a></td>
                                </tr>
                                @endforeach 
                            </tbody>
                        </table>
                    </div> 
                        <!--  pagination-->
                        <nav>
                            <ul class="pagination justify-content-center">
                                {{$listProjet->links() }}
                            </ul>
                        </nav>
                        
                        <!-- end of  pagination-->
                    
                </div>    
                
@endsection