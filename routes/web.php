<?php

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Precargar datos!
	Route::resource('/sedes','HeadquartersController');
	Route::resource('/areas','AreasController');
	Route::resource('/nucleos','NucleiController');
// Precargar datos!


// Profesor
Route::resource('/profesores','TeacherController');
Route::resource('/documentos','DocumentController');
Route::get('/profesores/documentos/{id}','DocumentController@create_document')->name('document.new');
Route::resource('/titulos','TitleController');
Route::get('/profesores/titulos/{id}','TitleController@create_title')->name('title.new');
Route::resource('/historicos','HistoryController');
Route::get('/profesor/historico/{id}','HistoryController@prof_history')->name('history.new');
// Profesor











Route::resource('/movimientos','MovementsController');
//RUTA DE API
Route::get('/design/{ci}','TeacherController@design_prof');