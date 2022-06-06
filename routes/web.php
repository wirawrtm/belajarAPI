<?php

use App\Http\Controllers\inputController;
use App\Http\Controllers\laraTodoListController;
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

Route::get('/', function () {
    return view('index');
});

Route::controller(inputController::class)->group(function(){
    route::post('tambah', 'store');
});

Route::controller(laraTodoListController::class)->group(function(){
    route::get('indexlara', 'index');
    route::post('tambahLara', 'store');
    route::get('edit/{id}', 'edit');
});