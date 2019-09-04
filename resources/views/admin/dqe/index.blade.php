@extends('layouts.app')

@section('content')

                        <div class="card mt-5 m-5">
                            <div class="card-header" style="background-color:#EA7207">
                                <h3 class=" text-center   text-light"> Resultats DQE par DAO</h3>
                            </div>
                         <div class="card-body">
                               
                                <table class="table table-bordered bg-light  table-sm">
                                
                                    @foreach ($dao as $item)
                                    <tr>
                                    <td>{{str_limit($item->libelle,80)}}</td>
                                    <td><a href="{{route('dqe.detail',['id'=>$item->DaoID])}}">Resultats DQE <i class="fas fa-info-circle"></i></a></td>
                                    </tr>
                                    @endforeach
                                    
                                    <tbody>  
                                    </tbody>
                                </table>
                        </div>  
                    </div>          
                          <!--  pagination-->
                          {{-- <nav>
                                <ul class="pagination justify-content-center">
                                    {{$listlot->links() }}
                                </ul>
                            </nav> --}}
                            
                            <!-- end of  pagination-->
@endsection                      