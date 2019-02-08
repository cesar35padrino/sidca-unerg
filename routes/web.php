<?php

Route::get('/', function () {
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('profesores','TeacherController');
Route::get('profesores/titulos/{id}','TeacherController@title_prof');

Route::get('/design/{ci}','TeacherController@design_prof');