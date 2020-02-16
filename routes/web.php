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

//Route::get('/', function () {
//    return view('home');
//})->middleware('auth');

Auth::routes();

Route::get('/', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/profile', 'UserController@index')->name('home')->middleware('auth');
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/dashboard', 'HomeController@showDashboard')->name('dashboard')->middleware('auth');
Route::post('/add-new-task', 'TaskController@addTask')->name('add-task')->middleware('auth');
Route::post('/update-task', 'TaskController@updateTask')->name('update-task')->middleware('auth');
Route::get('/my-issues', 'ProjectController@showUserIssues')->name('my-issues')->middleware('auth');
Route::get('/reported-by-me', 'ProjectController@showUserReportedIssues')->name('my-issues')->middleware('auth');
Route::get('/all-issues', 'HomeController@index')->name('my-issues')->middleware('auth');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
