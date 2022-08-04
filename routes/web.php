<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EspController;

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
// Get data esp
Route::get('/esp{humidity}/{temperature}', [EspController::class, 'sensor']);

Route::get('/', function () {
    return view('welcome');
});
