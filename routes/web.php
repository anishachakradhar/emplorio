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

//Employee details

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/etype','EmployeeTypeController@create')->name('employee.type');
Route::post('/etype/store', 'EmployeeTypeController@store')->name('employee.type.store');
Route::get('/etype/list','EmployeeTypeController@index')->name('employee.type.list');
Route::get('/etype/edit/{id}','EmployeeTypeController@edit')->name('employee.type.edit');
Route::patch('/etype/update/{id}','EmployeeTypeController@update')->name('employee.type.update');
Route::delete('/etype/delete/{id}','EmployeeTypeController@softdelete')->name('employee.type.delete');

Route::get('/edepartment','EmployeeDepartmentController@create')->name('employee.department');
Route::post('/edepartment/store','EmployeeDepartmentController@store')->name('employee.department.store');
Route::get('/edepartment/list','EmployeeDepartmentController@index')->name('employee.department.list');
Route::get('/edepartment/edit/{id}','EmployeeDepartmentController@edit')->name('employee.department.edit');
Route::patch('/edepartment/update/{id}','EmployeeDepartmentController@update')->name('employee.department.update');
Route::delete('/edepartment/delete/{id}','EmployeeDepartmentController@softdelete')->name('employee.department.delete');

Route::get('/employee','EmployeeController@create')->name('employee');
Route::post('/employee/store','EmployeeController@store')->name('employee.store');
Route::get('/employee/list','EmployeeController@index')->name('employee.list');
Route::get('/employee/edit/{id}','EmployeeController@edit')->name('employee.edit');
Route::patch('/employee/update/{id}','EmployeeController@update')->name('employee.update');
Route::delete('/employee/delete/{id}','EmployeeController@softdelete')->name('employee.delete');

Route::get('/eschedule/{id}','EmployeeScheduleController@create')->name('employee.schedule');
Route::post('/eschedule/store','EmployeeScheduleController@store')->name('employee.schedule.store');
Route::get('/eschedule/show/{id}','EmployeeScheduleController@show')->name('employee.schedule.show');
Route::get('/eschedule/edit/{id}','EmployeeScheduleController@edit')->name('employee.schedule.edit');
Route::patch('/eschedule/update/{id}','EmployeeScheduleController@update')->name('employee.schedule.update');
Route::delete('/eschedule/delete/{id}','EmployeeScheduleController@softdelete')->name('employee.schedule.delete');

//Attendance

Route::get('/attendance/{id}','AttendanceController@show')->name('employee.attendance');
// Route::post('/attendance/{id}','AttendanceController@show')->name('employee.attendance.show');
Route::get('import-export', 'AttendanceController@importExport');
Route::post('import', 'AttendanceController@import')->name('import');
Route::get('export', 'AttendanceController@export');
