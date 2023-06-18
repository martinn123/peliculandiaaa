<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PeliculaController;
use App\Http\Middleware\checkLogin;
use App\Models\Pelicula;

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

// Route::get('/', function () {
//     return view('index');
// });
// Route::get('/')->name("index"); //Página principal 

Route::get('/', [PeliculaController::class, "index2"])->name("index"); //Página principal 
Route::get('peliculas/{peliculas}', [PeliculaController::class, "show2"])->name("peliculas.show2");  

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('check');


Route::resource('pelicula', PeliculaController::class)->middleware('check');
// Route::middleware('Admin')->group(function () {
//     Route::resource('peliculas', 'PeliculaController');
// });