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

Route::get('/','HomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');
Route::post('/common/getCities','CommonController@getCities');
Route::post('/common/getDepartments','CommonController@getDepartments');
Route::post('/common/getTopics','CommonController@getTopics');

Route::prefix('admin')->group(function() {
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
  Route::get('/', 'AdminController@index')->name('admin.dashboard');
  Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});

Route::get('/personalInfo','forms\PersonalInfoController@index');
Route::post('/personalInfo/save','forms\PersonalInfoController@save');

Route::get('/contactInfo','forms\ContactInfoController@index');
Route::post('/contactInfo/save','forms\ContactInfoController@save');

Route::get('/occupation','forms\OccupationController@index');
Route::post('/occupation/save','forms\OccupationController@save');

Route::get('/englishTest','forms\EnglishTestController@index');
Route::post('/englishTest/save','forms\EnglishTestController@save');

Route::get('/financialInfo','forms\FinancialSourceController@index');
Route::post('/financialInfo/save','forms\FinancialSourceController@save');

Route::get('/reference','forms\ReferenceInfoController@index');
Route::post('/reference/save','forms\ReferenceInfoController@save');

//Route::get('/academicInterest','forms\AcademicInterestController@index');
//Route::post('academicReseachTopics/saveTopic','forms\AcademicInterestController@saveTopic');
//Route::post('academicReseachTopics/delete','forms\AcademicInterestController@delete');

Route::get('/academicInterest','forms\AcademicInterestController@index');
Route::post('/academicInterest/save','forms\AcademicInterestController@save');

Route::get('/academicInterestTopic1','forms\AcademicInterestController@index1');
Route::post('/academicInterest/saveTopic1','forms\AcademicInterestController@saveTopics1');

Route::get('/academicInterestTopic2','forms\AcademicInterestController@index2');
Route::post('/academicInterest/saveTopic2','forms\AcademicInterestController@saveTopics2');
