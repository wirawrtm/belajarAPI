<?php

use Illuminate\Http\Request;
use App\Http\Controllers\inputController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::controller(inputController::class)->group(function(){
    route::get('index','index');
    route::get('edit/{id}', 'edit');
    route::post('tambah', 'store');
    route::post('update/{id}', 'update');
    route::get('hapus/{id}','destroy');
});