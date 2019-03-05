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

 
Route::get('/', ['uses' => 'MainController@main', 'middleware' => 'auth']);

Route::group([ 'middleware'=> 'auth'] , function () {
    Route::resource('cause', 'CauseController');
    Route::resource('officer', 'OfficerController');
    Route::resource('accusation', 'AccusationController');
    Route::resource('users', 'UsersController');
    Route::resource('profile', 'ProfileController');
    Route::resource('SetPassword', 'SetPasswordController');
    Route::resource('referrals', 'ReferralsController');
     Route::resource('nationals', 'NationalsController');
});

//prosection
Route::get('/prosection', 'CauseController@prosection');
Route::get('/child', 'CauseController@child');

Route::get('/signout', 'UsersController@signout')->name('signout');

//search number
Route::get( '/search/number', 'SearchController@number')->name('number');
Route::post( '/search/number', 'SearchController@number');

//search child
Route::get( '/search/child', 'SearchController@child')->name('child');
Route::post( '/search/child', 'SearchController@child');

//search prosection
Route::get( '/search/prosection', 'SearchController@prosection')->name('prosection');
Route::post( '/search/prosection', 'SearchController@prosection');

//search victim
Route::get( '/search/victim', 'SearchController@victim')->name('victim');
Route::post( '/search/victim', 'SearchController@victim');

//search victim id
Route::get( '/search/victim_id', 'SearchController@victim_id')->name('victim_id');
Route::post( '/search/victim_id', 'SearchController@victim_id');


//search accused
Route::get( '/search/accused', 'SearchController@accused')->name('accused');
Route::post( '/search/accused', 'SearchController@accused');

//search accused id
Route::get( '/search/accused_id', 'SearchController@accused_id')->name('accused_id');
Route::post( '/search/accused_id', 'SearchController@accused_id');

//search officer
Route::get( '/search/officer', 'SearchController@officer')->name('officer');
Route::post( '/search/officer', 'SearchController@officer');


//search act date
Route::get( '/search/act_date', 'SearchController@act_date')->name('act_date');
Route::post( '/search/act_date', 'SearchController@act_date');


//search officer date
Route::get( '/search/officer_date', 'SearchController@officer_date')->name('officer_date');
Route::post( '/search/officer_date', 'SearchController@officer_date');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


//change password
Route::get('/changePassword','ProfileController@showChangePasswordForm')->name('change');
Route::post('/changePassword','ProfileController@changePassword')->name('changePassword');


//print
//Route::get('/pdf', 'PrintController@fun_pdf')->name('pdf');
