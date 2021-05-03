<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;

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

// Route::get('/','ProductController@show');
Route::get('/', [ProductController::class , 'index']);
Route::post('/add', [ProductController::class , 'add']);

Route::get('/product/{id}', [ProductController::class , 'edit']);


Route::put('/update/{id}',[ProductController::class,'update']);

Route::delete('/delete/{id}',[ProductController::class,'destroy']);


