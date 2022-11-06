<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\UserController;


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
Route::get('/user/edit/{id}', [UserController::class, 'edit']);
Route::post('/user/create', [UserController::class, 'create']);
Route::post('/user/update/{id}', [UserController::class, 'update']);
Route::post('/user/delete', [UserController::class, 'delete']);
