
@extends('layouts.app')
@section('content')
                        <div class="card mt-5 m-5">
                            <div class="card-header text-light text-center p-3" style="background-color:#EA7207
                            ">
                                Liste des Dp éditées
                            </div>
                            <div class="card-body p-3">
                                    <table class="table table-bordered bg-light text-center table-sm">
                                            <thead class="text-light" style="background-color:#15487F

                                            ">
                                                <tr>
                                                    <th>Numéro du DP</th>
                                                    <th> Prestations</th>
                                                    <th>PRIX</th>
                                                    <th>achat/depôt</th>
                                                    {{-- <th>Date Saisie</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($listdp as $dp )
                                                <tr>
                                                    <td>{{$dp->numDP}}</td>
                                                    <td>{{$dp->Prestations}}</td>
                                                    <td>{{ number_format($dp->Prixdp, 0, ',', '.') }} fcfa</td>
                             
                                                    <td><a href="{{route('dp.detail',$dp->dPID)}}"><i class="fas fa-eye"></i></a></td>
            
                                                    {{-- {{ number_format($dao->Prixdao, 0, ',', '.') }} --}}
                                                    {{-- date('d-m-Y', strtotime($user->from_date)); --}}
                                                    {{-- <td>{{date('d-m-Y',strtotime($dp->DateSaisie))}}</td> --}}
                                                </tr>
                                                @endforeach
                                                                            
                                            </tbody>
                                        </table>
                            </div>
                        </div>
                      
                        </div>
                    </div>    
@endsection                         




