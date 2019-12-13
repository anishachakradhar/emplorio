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
    return view('auth.login');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get('/apply','ApplyController@index')->name('apply');
Route::post('/store','ApplyController@store')->name('store');
Route::get('/dashboard','ApplyController@dashboard')->name('dashboard'); // ->middleware(['auth','HrMiddleware']);
Route::get('/show','ApplyController@show')->name('show');
Route::get('/singleApplier/{id}','ApplyController@viewIndividual')->name('singleApplier');
Route::get('approvedList','ApplyController@approvedApplier')->name('approvedList');

Route::post('/approve/{id}','ResultController@approve')->name('approve');
Route::post('/reject/{id}','ResultController@reject')->name('reject');

Route::get('scheduleForm/{id}','InterviewScheduleController@scheduleForm')->name('scheduleForm');
Route::post('storeScheduleInfo','InterviewScheduleController@storeInterviewInfo')->name('interviewInfo');
Route::get('showInterviewInfo','InterviewScheduleController@showInterviewInfo')->name('showInterviewInfo');