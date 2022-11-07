<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserCompanyController;


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
Route::get('/users/list', [UserController::class, 'list']);
Route::get('/user/add', [UserController::class, 'add']);
Route::post('/user/create', [UserController::class, 'create']);
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/delete', [UserController::class, 'delete']);

Route::get('/companies/list', [CompanyController::class, 'list']);
Route::get('/company/add', [CompanyController::class, 'add']);
Route::post('/company/create', [CompanyController::class, 'create']);
Route::get('/company/edit/{id}', [CompanyController::class, 'edit']);
Route::post('/company/update/{id}', [CompanyController::class, 'update']);
Route::post('/company/delete', [CompanyController::class, 'delete']);

Route::get('/company/addUser/{id}', [UserCompanyController::class, 'add']);
Route::post('/usercompany/create/{id}', [UserCompanyController::class, 'create']);
