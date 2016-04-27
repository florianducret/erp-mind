<?php

use Illuminate\Support\Facades\App;
use App\Team;
use App\User;

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
	
	Route::get('/teams', function() {

		$team1 = new Team();
		$team1->owner_id = User::where('firstname', 'Ahmed')->first()->getKey();
		$team1->name = 'Trésorerie';
		$team1->save();

		$team2 = new Team();
		$team2->owner_id = User::where('firstname', 'Alexandre')->first()->getKey();
		$team2->name = 'Qualité';
		$team2->save();
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
