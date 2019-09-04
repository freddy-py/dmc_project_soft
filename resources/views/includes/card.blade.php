<!--  cards-->
<section>
    <div class="container-fluid">
        
                <div class="row pt-md-5 mt-md-3 mb-5">
                    <div class="col-xl-3 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body" style="border-left:20px  solid #15487F;">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-database fa-3x text-warning"></i>
                                    <div class="text-right text-secondary">
                                        <h5> <a href="{{route('projets.listProjet')}}">Projets</a> </h5>
                                        {{--  <h6>{{$projets->count()}}</h6>  --}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body" style="border-left:15px  solid #15487F">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-handshake fa-3x text-success"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Marchés</h5>
                                       
                                    </div>
                                </div>
                            </div>
                          
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 p-2">
                        <div class="card card-common" >
                            <div class="card-body" style="border-left:15px  solid #15487F">
                                <div class="d-flex justify-content-between">
                                    <i class=" fas fa-calculator fa-3x text-danger"></i>
                                    <div class="text-right text-secondary">
                                        <h5>Budgets</h5>
                                       
                                    </div>
                                </div>
                            </div>
                           
                        </div>

                    </div>
                    <div class="col-xl-3 col-sm-6 p-2">
                        <div class="card card-common">
                            <div class="card-body" style="border-left:15px  solid #15487F">
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-money-bill-wave fa-3x text-info"></i>
                                    <div class="text-right text-secondary">
                                        <h5><a href="{{route('bailleur.index')}}">Bailleurs</a></h5>
                                        {{--  <h6> {{$bailleurs->count()}}</h6>  --}}
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <div class="col-xl-3 col-sm-6 p-2">
                            <div class="card card-common" style="border-left:15px  solid #15487F">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                            <i class="fas fa-people-carry fa-3x text-dark"></i>
                                       
                                        <div class="text-right text-secondary">
                                            <h5><a href="{{route('prestations.index')}}">Prestations</a></h5>
                                            {{--  <h6> {{$bailleurs->count()}}</h6>  --}}
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>

                        <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card card-common" >
                                    <div class="card-body" style="border-left:15px  solid #15487F">
                                        <div class="d-flex justify-content-between">
                                                <i class="fas fa-calendar-alt fa-3x text-success"></i>
                                            <div class="text-right text-secondary">
                                                <h5><a href="{{route('evenement.list')}}">Evénements</a></h5>
                                                {{--  <h6> {{$bailleurs->count()}}</h6>  --}}
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card card-common">
                                    <div class="card-body" style="border-left:15px  solid #15487F">
                                        <div class="d-flex justify-content-between">
                                                <i class="fas fa-book fa-3x text-primary"></i>
                                              
                                            <div class="text-right text-secondary">
                                                <h5><a href="{{route('dao.list')}}">liste DAO édités</a></h5>
                                              
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>

                            <div class="col-xl-3 col-sm-6 p-2">
                                <div class="card card-common" style="border-left:15px  solid #15487F">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                                <i class="fas fa-book-open fa-3x text-warning"></i>
                                              
                                            <div class="text-right text-secondary">
                                                <h5><a href="{{route('dp.list')}}">liste DP éditées</a></h5>
                                              
                                            </div>
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 p-2">
                                    <div class="card card-common" style="border-left:15px  solid #15487F">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                    <i class="fas fa-chart-line fa-3x text-info"></i>
                                                  
                                                <div class="text-right text-secondary">
                                                    <h5><a href="{{route('dqe.index')}}">Resultats DQE</a></h5>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                       
                                    </div>
                            </div>
        </div>
    </div>
</section>
<!-- end cards-->