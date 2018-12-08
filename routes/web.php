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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('etudiants', 'EtudiantController');

Route::resource('ecoles', 'EcoleController');

Route::resource('classes', 'ClasseController');

Route::resource('annes', 'AnneAcademiqueController');

Route::get('affectations/destroy/{id}', 'AffectationController@destroy')->name('deleteaffectation');

Route::get('affectations/create/{id}', 'AffectationController@create')->name('createaffectation');

Route::post('affectations/saveaffectations', 'AffectationController@saveaffectations')->name('saveaffectations');

Route::get('affectations/list/{idanne}/{idclasse}', 'AffectationController@list')->name('listaffectations');


Route::resource('affectations', 'AffectationController');


Route::get('export-file/{type}', 'ExcelController@exportFile')->name('export.file');

//Route::get('affectations/affects', array('as'=>'affectations.affects', 'uses'=>'AffectationController@affects'));