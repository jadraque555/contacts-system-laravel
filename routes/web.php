<?php

use Illuminate\Support\Facades\Route;
use App\Models\Brands;
use App\Http\Middleware\Administrator;
use App\Http\Middleware\SuperAdministrator;
use Illuminate\Http\Request;
use App\Models\VisitorsLogs;
use Jenssegers\Agent\Facades\Agent;
use App\Traits\QuickBook;


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
// Welcome page 
Route::get('/', function (Request $request) {
    return redirect()->route('login');
});



// Auth Scafollding 
Auth::routes();

// Home Controller 
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// contacts route controller 
Route::group(['prefix' => 'contacts'], function()
{
    Route::get('/', [App\Http\Controllers\ContactController::class, 'index'])->name('contacts.index');
    Route::get('/create', [App\Http\Controllers\ContactController::class, 'create'])->name('contacts.create');
    Route::post('store', [App\Http\Controllers\ContactController::class, 'store'])->name('contacts.store');
    Route::get('/edit/{id}', [App\Http\Controllers\ContactController::class, 'edit'])->name('contacts.edit');
    Route::post('update/{id}', [App\Http\Controllers\ContactController::class, 'update'])->name('contacts.update');
    Route::get('show/{id}', [App\Http\Controllers\ContactController::class, 'show'])->name('contacts.show');
    Route::get('/delete/{id}', [App\Http\Controllers\ContactController::class, 'destroy'])->name('contacts.destroy');
});
// exit

