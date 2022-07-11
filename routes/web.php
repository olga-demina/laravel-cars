<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')
    ->namespace('Admin') // Cartella dove si trovano i controller
    ->name('admin.') // la prima parte del name di route: es: admin.home, admin.cars.index ecc
    ->prefix('admin') // la prima parte del url di route, es: admin/ , admin/cars/, admin/cars/create ecc
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('home');
    });