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
//Frontend
Route::get('/', 'HomeController@index');
Route::get('/index', 'HomeController@index');
Route::get('/job-list-by-category/{category_id}', 'HomeController@getJobByCateId');
Route::get('/job-details/{job_id}', 'HomeController@getJobDetailsById');
Route::get('/job-list', 'HomeController@getAllJob');
Route::post('/search', 'HomeController@search');
Route::get('/contact', 'HomeController@contact');
//Employee
Route::get('/employee-login', 'EmployeeController@employeeLogin');
Route::post('/employee-getLogin', 'EmployeeController@getLogin');
Route::get('/employee-logout', 'EmployeeController@getLogout');
Route::get('/employee-register', 'EmployeeController@employeeRegister');
Route::post('/store-employee', 'EmployeeController@storeEmployee');
Route::get('/employee-apply/{job_id}', 'EmployeeController@employeeApply');
Route::get('/employee-hasapply', 'EmployeeController@employeeHasApply');
Route::get('/employee-notification', 'EmployeeController@employeeNotification');
Route::post('/employee-getapply/{job_id}', 'EmployeeController@employeeGetApply');
//Category
Route::get('/admin/category', 'CategoryController@getAll');
Route::get('/admin/add-category', 'CategoryController@addCategory');
Route::post('/admin/store-category', 'CategoryController@storeCategory');
Route::get('/admin/unactive-category/{category_id}','CategoryController@unactiveCategory' );
Route::get('/admin/active-category/{category_id}','CategoryController@activeCategory' );
Route::get('/employee-edit', 'EmployeeController@editEmployee');
Route::post('/employee-update', 'EmployeeController@updateEmployee');

Route::get('/admin/edit-category/{category_id}','CategoryController@editCategory' );
Route::post('/admin/update-category/{category_id}', 'CategoryController@updateCategory');
Route::get('/admin/delete-category/{category_id}','CategoryController@deleteCategory' );
//Employer
Route::get('/employer', 'EmployerController@getAllJobById');
Route::get('/employer-login', 'EmployerController@employerLogin');
Route::post('/employer-getLogin', 'EmployerController@getLogin');
Route::get('/employer-logout', 'EmployerController@getLogout');
Route::get('/employer-register', 'EmployerController@employerRegister');
Route::post('/store-employer', 'EmployerController@storeEmployer');
Route::get('/employer-edit', 'EmployerController@editEmployer');
Route::post('/employer-update', 'EmployerController@updateEmployer');
Route::get('/employer/add-job', 'EmployerController@addJob');
Route::post('/employer/store-job', 'EmployerController@storeJob');
Route::get('/employer/job-details/{job_id}', 'EmployerController@getJobDetailsById');
Route::get('/employer/edit-job/{job_id}', 'EmployerController@editJob');
Route::post('/employer/update-job/{job_id}', 'EmployerController@updateJob');
Route::get('/employer/has-apply/{job_id}', 'EmployerController@employerHasApply');
Route::get('/employer/has-apply-accept/{job_id}', 'EmployerController@applyAccept');
Route::get('/employer/has-apply-deny/{job_id}', 'EmployerController@applyDeny');
//Backend
Route::get('/admin', 'AdminController@index');
Route::get('/dashboard', 'AdminController@dashboard');
Route::post('/admin-login', 'AdminController@getLogin');
Route::get('/logout', 'AdminController@getLogout');
Route::get('/admin-account','AdminController@getAll');
Route::get('/add-admin-account','AdminController@addAdminAccount');
Route::post('/store-admin-account', 'AdminController@storeAdminAccount');
Route::get('/edit-admin-account/{admin_id}','AdminController@editAdminAccount' );
Route::post('/update-admin-account/{admin_id}','AdminController@updateAdminAccount' );
Route::get('/delete-admin-account/{admin_id}','AdminController@deleteAdminAccount' );

Route::get('/admin/job', 'AdminController@getAllJob');
Route::get('/admin/unactive-job/{job_id}','AdminController@unactiveJob' );
Route::get('/admin/active-job/{job_id}','AdminController@activeJob' );
Route::get('/admin/delete-job/{job_id}','AdminController@deleteJob' );

Route::get('/admin/employer', 'AdminController@getAllEmployer');
Route::get('/admin/delete-employer/{employer_id}','AdminController@deleteEmployer' );

Route::get('/admin/employee', 'AdminController@getAllEmployee');
Route::get('/admin/delete-employee/{employee_id}','AdminController@deleteEmployee' );