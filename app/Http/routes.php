<?php

use Illuminate\Support\Facades\App;

Route::group(['middleware' => 'web'], function () {
    
    Route::get('/', 'HomeController@index');
 	Route::auth();  

    Route::get('/home', 'HomeController@index');
    
	/*
	 * Inscriptions
	 */
    Route::get('/pole/inscription', 'TeamController@inscriptionGet');
    Route::post('/pole/inscription', 'TeamController@inscriptionPost');
  	
	/*
	 * Tableaux de bord
	 */
	Route::controller('/tableauDeBord', 'TableauDeBordController');
	
	/*
	 * Tresorerie
	 */
	Route::controller('/tresorerie', 'TresorerieController');
  
	/*
	 * Administration
	 */
	Route::controller('/administration','AdministrationController');

	/* 
	 * Status
	 */
	Route::post('/status', 'StatusController@status');
	Route::post('/status/reply/{status_id}', 'StatusController@reply');
	

	/*
	/*
	 * Pages de recherche
	 */
    Route::get('/search/projets', function(){
        return view('searchPanels.projets');
    });
	
	Route::get('/search/entreprises', function(){
        return view('searchEntreprises.entreprises');
    });
	
	/*
	 * Page pour tester
	 */
	Route::get('/test', function(){
		$pusher = App::make('pusher');
		$pusher->trigger( 'test-channel',
						  'test-event', 
						  array('text' => 'Preparing the Pusher Laracon.eu workshop!'));
    });
	

});
