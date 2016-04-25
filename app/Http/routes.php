<?php

use Illuminate\Support\Facades\App;

Route::group(['middleware' => 'web'], function () {
    
 	Route::auth();  
    
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    Route::controller('/pole', 'TeamController');
	Route::controller('/tableauDeBord', 'TableauDeBordController');
	Route::controller('/todo', 'TodoController'); 
	Route::controller('/tresorerie', 'TresorerieController');
	Route::controller('/administration','AdministrationController');
	
	Route::post('/status', 'StatusController@status');
	Route::post('/status/reply/{status_id}', 'StatusController@reply');
	
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
