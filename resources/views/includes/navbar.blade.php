<nav class="navbar navbar-expand-md navbar-dark">
        <button class="navbar-toggler ml-auto mb-2 bg-dark" type="button" data-toggle="collapse" data-target="#myNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="myNavbar">
            <div class="container-fluid">
                <div class="row">
                    <!--sidebar-->
                    <div class="col-xl-2 col-lg-2 col-md-2 sidebar fixed-top">
                        <a href="" class="navbar-brand text-danger d-block mx-auto text-center py-3 mb-4 bottom-border"><img src="{{asset('images/logo-ageroute.png')}}" alt="" width="150xp"></a>
                        <div class="bottom-border">
                            {{-- <img src="{{asset('images/admin.jpeg')}}" alt="" width="50px;" class="rounded-circle mr-3"> --}}
                           
                        </div>
                        <ul class="navbar-nav flex-column mt-2">
                            <li class="nav-item sidebar-link {{ Route::currentRouteNamed('welcome') ? 'current' : ''  }} ">
                                <a href="/" class="nav-link p-2 mb-1 " id="colorText"> <i class="fas fa-home   mr-2"  ></i> Tableau de bord</a>
                            </li>
                            <li class="nav-item sidebar-link  {{ Route::currentRouteNamed('projets.listProjet') ?      'current' : ''  }} ">
                                <a href="{{route('projets.listProjet')}} " class="nav-link p-2 mb-1 " id="colorText"> <i class="fas fa-database text-dark text-w-3 fa-lg mr-2"  ></i>Projets</a>
                            </li>
                            <li class="nav-item sidebar-link {{ Route::currentRouteNamed('bailleur.indext') ?      'current' : ''  }}">
                            <a href="{{route('bailleur.index')}}" class="nav-link p-2 mb-1"   id="colorText"> <i class="fas fa-handshake text-dark text-w-3 fa-lg mr-2"  ></i>Bailleurs</a>
                            </li>
                            <li class="nav-item sidebar-link {{ Route::currentRouteNamed('prestations.index') ?      'current' : ''  }}">
                                <a href="{{route('prestations.index')}}" class="nav-link p-2 mb-1"   id="colorText"> <i class="fas fa-hourglass-half text-dark text-w-3 fa-lg mr-2"   ></i> Prestations</a>
                            </li>
                            <li class="nav-item sidebar-link {{ Route::currentRouteNamed('dao.list') ?      'current' : ''  }}">
                            <a href="{{route('dao.list')}}" class="nav-link p-2 mb-1" id="colorText"><i class="fas fa-book-open fa-lg mr-3 text-dark text-w-3"   ></i>DAO</a>
                            </li>
                            <li class="nav-item sidebar-link  {{ Route::currentRouteNamed('dp.list') ? 'current' : ''  }} ">
                                <a href="{{route('dp.list')}}" class="nav-link p-2 mb-1"   id="colorText"> <i class="fas fa-chart-pie text-dark text-w-3 fa-lg mr-3"  ></i> DP</a>
                            </li>
                            <li class="nav-item sidebar-link {{ Route::currentRouteNamed('evenement.list') ?      'current' : ''  }}">
                                <a href="{{route('evenement.list')}}" class="nav-link p-2 mb-1"   id="colorText"><i class="fab fa-algolia text-dark text-w-3 fa-lg mr-3"   ></i>  Evénements</a>
                            </li>
                            <li class="nav-item sidebar-link {{ Route::currentRouteNamed('dqe.index') ?      'current' : ''  }}">
                                <a href="{{route('dqe.index')}}" class="nav-link p-2 mb-1"   id="colorText"><i class="fas fa-chart-line text-dark text-w-3 fa-lg mr-3" ></i> DQE</a>
                            </li>
                        </ul>
                    </div>
                    <!--end sidebar-->
                    <!--top nav-->
                    <div class="col-xl-10 col-lg-9 col-md-8 ml-auto  fixed-top  top-navbar" style="background:#15487F
                    ">
                        <div class="row">
                            <div class="col-7">
                               
                            </div>

                            {{--  <div class="col-md-5">
                                
                            </div>  --}}
                            <div class="col-5">
                                <ul class="navbar-nav">
                                        <p class="text-white text-w-5">{{auth::user()->name}}</p>
                                    <li class="nav-item ml-md-auto" data-toggle="modal" data-target="#sign-out">
                                            <a  href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:red">                                         Déconnexion <i class="fas fa-sign-in-alt text-danger"></i>
                                    </a> 
                                        
                                    </li>

                                </ul>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                            </div>
                        </div>
                    </div>
                    <!--end top nav-->
                </div>
            </div>
        </div>
    </nav>



    {{-- <li class="{{ Route::currentRouteNamed('test.dashboard') ? 'active' : ''  }}"><a href="{{ route('test.dashboard') }}">Test Dashboard</a></li> --}}