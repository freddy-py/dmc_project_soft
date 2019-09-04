@extends('layouts.app')

@section('content')
<div class="container-fluid">
                        <div class="card p-3 mt-5">
                            <div class="card-header text-center text-light" style="background-color:#EA7207
                            ">
                                    Liste des Dao édités
                            </div>
                            <div class="card-body">
                                    <table class="table table-bordered bg-light text-center table-sm">
                                            <thead class =" text-light" style="background-color:  #15487F">
                                                <tr>
                                                    <th>Numéro du DAO</th>
                                                    <th> Prestations</th>
                                                    <th>PRIX</th>
                                                    <th>Plus d'infos</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listdao as $dao )
                                                <tr>
                                                    <td>{{$dao->numDAO}}</td>
                                                    <td>{{$dao->Prestations}}</td>
                                                    <td>{{ number_format($dao->Prixdao, 0, ',', '.') }} fcfa</td>
                                                    {{-- {{ number_format($dao->Prixdao, 0, ',', '.') }} --}}
                                                    {{-- date('d-m-Y', strtotime($user->from_date)); --}}
                                                    {{-- <td>{{date('d-m-Y',strtotime($dao->DateSaisie))}}</td> --}}
                                                    <td><a href="{{route('dao.detail',$dao->DaoID)}}"><i class="fas fa-eye"></i></a></td>
                                                    
                                                </tr>
                                                @endforeach
                                                
                                            </tbody>
                                        </table>
                                         <!--  pagination-->
                           
                                          <!-- end of  pagination-->
                            </div>
                        </div>
            
</div>                    
@endsection  