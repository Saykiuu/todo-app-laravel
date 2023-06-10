<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
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

Route::get('/', [TodoController::class, 'index']);

Route::get('/createToken', [TodoController::class, 'createToken']);
Route::get('/limparToken', [TodoController::class, 'limparToken']);


Route::group(['middleware'=>['autentication']], function(){
    Route::post('/tasks', [TodoController::class, 'store']);
    Route::post('/updateTask', [TodoController::class, 'update']);
    Route::delete('/deleteTask', [TodoController::class, 'destroy']);
});

