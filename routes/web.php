<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    return view('item');
});

Route::controller(UserController::class)->group(function(){
    Route::get('users', 'index');
    Route::get('getUsers', 'getUsers');
    Route::get('users-export', 'export')->name('users.export');
    Route::post('users-import', 'import')->name('users.import');
});

Route::controller(ItemController::class)->group(function(){
    Route::get('items', 'index');
    Route::get('items-export', 'export')->name('items.export');
    Route::post('items-import', 'import')->name('items.import');
    Route::post('clear', 'clear')->name('items.clear');
});
