<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::post('auth/login' , ['as' => 'auth.login' , 'uses' => 'AuthController@authenticate']);
Route::get('login' , 'AuthController@login');

Route::post('auth/signup' , ['as' => 'auth.signup' , 'uses' => 'AuthController@register']);
Route::get('signup' , 'AuthController@signup');

Route::get('forms/{link}' , ['as' => 'forms.link' , 'uses' => 'AnswerController@showForm']);
Route::post('submit/{link}' , ['as' => 'forms.submit' , 'uses' => 'AnswerController@submit']);
// class Foo{

// }
// Route::bind('foo' , new Foo);
Route::group(['middleware' => 'auth'], function () {
	Route::get('/' , function(){ return redirect()->route('form.index') ; });
	

	Route::resource('form', 'FormController');
	Route::resource('input', 'InputController');
	Route::get('logout' , 'AuthController@logout');
	Route::get('results/{form}' , ['as' => 'results' , 'uses' => 'AnswerController@show']);
});