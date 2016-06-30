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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/appraisals', 'AppraisalsController@index');
Route::get('/appraisals/create', 'AppraisalsController@create');
Route::post('/appraisals', 'AppraisalsController@store');
//Route::get('/appraisals/{id}', 'CustomFieldsController@show');
Route::get('appraisals/{id}',['as' => 'appraisals', 'uses' => 'CustomFieldsController@show']);
Route::get('appraisals/{id}/ajax','CustomFieldsController@ajax');
Route::post('appraisals/{id}','CustomFieldsController@store');


Route::auth();

Route::get('/home', 'HomeController@index');
