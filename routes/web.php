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
// Route::get('/', function () {
//     return view('vendor/multiauth/admin/login');
// });



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('employee' , 'EmployeeController')->middleware('role:super');
Route::resource('patient' , 'PatientController')->middleware('role:receptionist,nurse');
Route::resource('doctor' , 'DoctorController')->middleware('role:doctor');
Route::resource('nurse' , 'NurseController')->middleware('role:nurse');
Route::resource('lab' , 'LabController')->middleware('role:labtech,nurse');
Route::resource('accountant' , 'AccountantController')->middleware('role:accountant');
Route::resource('pharmacist' , 'PharmacistController')->middleware('role:pharmacist');

