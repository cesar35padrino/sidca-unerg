<?php

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// USUARIOS
	Route::resource('/usuarios','UsersController');
// USUARIOS

// PRECARGAR DATOS!
	Route::resource('/sedes','HeadquartersController');
	Route::resource('/areas','AreasController');
	Route::resource('/nucleos','NucleiController');
	Route::resource('/unidad-curricular','SubjectController');
	Route::resource('/programas','ProgramsController');
	Route::resource('/periodos','PeridController');
// PRECARGAR DATOS!

// NOMINA D:
	Route::resource('/nominas','RosterController');
// NOMINA D:


// PROFESOR
	Route::resource('/profesores','TeacherController');
	Route::resource('/documentos','DocumentController');
	Route::get('/profesores/documentos/{id}','DocumentController@create_document')->name('document.new');
	Route::resource('/titulos','TitleController');
	Route::get('/profesores/titulos/{id}','TitleController@create_title')->name('title.new');
	Route::resource('/historicos','HistoryController');
	Route::get('/profesor/historico/{id}','HistoryController@prof_history')->name('history.new');
	Route::get('/profesor/expediente/{id}','CasefileController@prof_casefile')->name('profesores.casefile');
// PROFESOR

//RUTA DE API
	Route::get('/design/{ci}','TeacherController@design_prof');