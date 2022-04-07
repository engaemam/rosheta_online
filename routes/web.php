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
Route::get('/pharmacy/{id}', 'PatientController@pharmacy');
Route::get('/hospital/{id}', 'PatientController@hospital');
Route::get('/about', 'PatientController@about');
Route::get('/patient/pharmacies', 'PatientController@pharmacies');
Route::get('/patient/hospitals', 'PatientController@hospitals');
Route::get('/','PatientController@home');
Route::group(['middleware'=>'guest'],function(){

	Route::get('password/reset/{token}','PatientController@reset');
	Route::post('password/reset/{token}','PatientController@reset_final');
	Route::post('/patient/forget', 'PatientController@reset_request');
	Route::get('/forget/password', 'PatientController@forget_password');

	Route::get('dpassword/reset/{token}','DoctorController@reset');
	Route::post('dpassword/reset/{token}','DoctorController@reset_final');
	Route::post('/doctor/forget', 'DoctorController@reset_request');
	Route::get('/dforget/password', 'DoctorController@forget_password');

	Route::get('ppassword/reset/{token}','PharmacistController@reset');
	Route::post('ppassword/reset/{token}','PharmacistController@reset_final');
	Route::post('/pharmacist/forget', 'PharmacistController@reset_request');
	Route::get('/pforget/password', 'PharmacistController@forget_password');

	Route::get('doctor/login','DoctorController@login');
	Route::get('pharmacist/login','PharmacistController@login');
	Route::get('patient/login','PatientController@login');
	Route::post('/check/doctor','DoctorController@check_login');
	Route::post('/check/pharmacist','PharmacistController@check_login');
	Route::post('/check/patient','PatientController@check_login');
	Route::get('/doctor/register', 'DoctorController@register');
	Route::post('/doctor/doregister', 'DoctorController@do_register');
	Route::get('/pharmacist/register', 'PharmacistController@register');
	Route::post('/pharmacist/doregister', 'PharmacistController@do_register');
	Route::get('/patient/register', 'PatientController@register');
	Route::post('/patient/doregister', 'PatientController@do_register');
});
//Route::get('/change','DoctorController@change');

Route::group(['middleware'=>'doctor:doctor'],function(){
Route::any('/doctor/logout','DoctorController@logout');
Route::get('/doctor/home','DoctorController@home');
Route::get('/doctor/patients','DoctorController@patients');
Route::post('/doctor/edp','DoctorController@edit_patient');
Route::post('/doctor/svp','DoctorController@save_patient');
Route::post('/doctor/spr','DoctorController@add_presc');
Route::post('/doctor/edh','DoctorController@edit_hospital');
Route::post('/doctor/edit','DoctorController@edit_profile');
Route::get('/doctor/vwp/{id}','DoctorController@patient');
Route::get('/doctor/profile/{id}','DoctorController@profile');
Route::get('/doctor/hospital/{id}','DoctorController@hospital');
Route::get('/doctor/prescription/{id}','DoctorController@prescription');
Route::get('/doctor/prescriptions','DoctorController@prescriptions');
Route::get('/doctor/messages','DoctorController@messages');
Route::get('/doctor/sent','DoctorController@sent');
Route::post('/doctor/reply','DoctorController@reply');
});

Route::group(['middleware'=>'pharmacist:pharmacist'],function(){
Route::any('/pharmacist/logout','PharmacistController@logout');
Route::get('/pharmacist/home','PharmacistController@home');
Route::get('/pharmacist/patients','PharmacistController@patients');
Route::get('/pharmacist/messages','PharmacistController@messages');
Route::get('/pharmacist/sent','PharmacistController@sent');
Route::post('/pharmacist/edit','PharmacistController@edit_profile');
Route::post('/pharmacist/reply','PharmacistController@reply');
Route::get('/pharmacist/vwp/{id}','PharmacistController@patient');
Route::get('/pharmacist/prescription/{id}','PharmacistController@prescription');
Route::get('/pharmacist/prescriptions','PharmacistController@prescriptions');
Route::post('/pharmacist/edp','PharmacistController@edit_pharmacy');
Route::get('/pharmacist/profile/{id}','PharmacistController@profile');
Route::get('/pharmacist/pharmacy/{id}','PharmacistController@pharmacy');
});

Route::group(['middleware'=>'patient:patient'],function(){
Route::any('/patient/logout','PatientController@logout');
Route::get('/sent','PatientController@sent');
Route::get('/messages','PatientController@messages');
Route::post('/reply/doctor','PatientController@reply_doctor');
Route::post('/reply/pharmacist','PatientController@reply_pharmacist');
Route::get('/history/patient','PatientController@history');
Route::get('/prescription/{id}','PatientController@prescription');
Route::get('/patient/profile','PatientController@profile');
Route::post('/patient/eprofile','PatientController@edit_profile');

});