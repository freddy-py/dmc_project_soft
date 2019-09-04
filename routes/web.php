<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
route::get('/test',function(){
    return view('test');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/evenement', function () {
    return view('admin.evenements.index');
});

Auth::routes();
Route::get('/', 'HomeController@login')->name('login');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/admin/projets',[
    'uses' =>'ProjetsController@index',
    'as' => 'projets.listProjet'
]);

Route::get('/admin/projets/{id}',[
    'uses' =>'ProjetsController@projetUnique',
    'as' => 'projets.uniqueProjet'
]);


Route::get('/admin/bailleurs',[
    'uses' =>'BailleursController@index',
    'as' => 'bailleur.index'
]);


Route::get('admin/bailleur/{libelle}',[
    'uses' => 'BailleursController@financement',
    'as' => 'bailleur.financement'
]);


Route::get('/admin/bar-chart',
    [ 
        'uses'=> 'ChartController@index',
        'as'=>'graphe.chart'
]);

Route::get('/admin/prestations',[
    'uses' =>'PrestationsController@index',
    'as' => 'prestations.index'
]);


Route::get('/admin/prestation/detail/{id}',[
    'uses' =>'PrestationsController@show',
    'as' =>'prestation.detail'
]);


Route::get('/admin/dao/index',[
'uses' => 'DaoController@index',
'as' =>'dao.list'
]);

Route::get('/admin/dao/detail/{id}',[
    'uses' =>'DaoController@show',
    'as' =>'dao.detail'
]);


Route::get('/admin/dp/index',[
    'uses' => 'DpController@index',
    'as' =>'dp.list'
    ]);


Route::get('/admin/dp/detail/{id}',[
        'uses' => 'DpController@show',
        'as' =>'dp.detail'
        ]);


    
Route::get('/admin/evenements/index',[
    'uses' => 'EvenementsController@index',
    'as' =>'evenement.list'
    ]);

Route::get('/admin/dp/download',[
        'uses' => 'DpController@downloadFile',
        'as' =>'dp.download'
        ]);
        
 Route::get('/admin/dqe/index',[
            'uses' => 'DqeController@index',
            'as' =>'dqe.index'
            ]);

Route::get('/admin/dqe/detail/{id}',[
                'uses' => 'DqeController@detail',
                'as' =>'dqe.detail'
                ]);

Route::get('/admin/dqe/resultat/{id}',[
                    'uses' => 'DqeController@resultatDqe',
                     'as' =>'dqe.resultat'
                    ]);


Route::get('/admin/dqe/analyse/{libelle}/{entreprise}',[
                        'uses' => 'DqeController@analyseDQE',
                         'as' =>'dqe.analyse.entreprise'
                        ]);   
                        
                        
 Route::get('/admin/dqe/retenu/{entreprise}',[
                            'uses' => 'DqeController@retenu',
                             'as' =>'dqe.retenu'
                            ]);


 Route::get('/admin/dqe/nonretenu/{entreprise}',[
                                'uses' => 'DqeController@Nonretenu',
                                 'as' =>'dqe.nonretenu'
                                ]);