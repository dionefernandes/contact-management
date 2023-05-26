<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

//Route::view('/', 'auth.login');

Route::prefix('auth')
	->name('auth.')
	->controller(AuthController::class)
	->group(function()
	{
		Route::get('/register', 'formRegister')->name('formRegister');
		Route::get('/login', 'formLogin')->name('login');
		Route::post('/login', 'login')->name('access');
		Route::post('/logout', 'logout')->middleware('auth')->name('logout');
	})
;

Route::fallback(function() {
	return redirect()->route('auth.login');
});

Route::prefix('users')
	->middleware('auth')
	->name('user.')
	->controller(UsersController::class)
	->group(function()
{
	Route::post('/add', 'store')->name('store')->withoutMiddleware('auth');
	
	Route::get('/add', 'create')->name('create');
	Route::get('/', 'index')->name('index')->withoutMiddleware('auth');

	Route::get('/{user}', 'show')->missing(function () {
        return redirect()->route('user.index');
    })
    ->name('show');
	Route::get('/edit/{user}', 'edit')->name('edit');
	
	Route::put('/update/{id}', 'update')->name('update');
	
	Route::delete('/delete/{id}', 'destroy')->name('destroy');
});

Route::fallback(function() {
	return redirect()->route('user.index');
});