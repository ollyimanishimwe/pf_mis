<?php
use Ap\User;

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
    return view('vendor/multiauth/admin/login');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('employee' , 'EmployeeController');
Route::resource('patient' , 'PatientController');
Route::resource('doctor' , 'DoctorController');
Route::resource('nurse' , 'NurseController');
Route::resource('lab' , 'LabController');
Route::resource('accountant' , 'AccountantController');
Route::resource('pharmacist' , 'PharmacistController');
Route::resource('service' , 'ServiceController');
Route::resource('medecine' , 'MedecineController');
