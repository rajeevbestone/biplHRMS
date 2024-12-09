<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

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


// Session In Routes Start
Route::middleware('SessionInCheck')->group(function(){
    Route::get('/dashboard', [DashboardController::class, "showDashboard"])->name('dashboard');
});
// Session In Routes End

// Session Out Routes Start
Route::middleware('SessionOutCheck')->group(function(){
    Route::get('/', [AuthController::class, "showLoginForm"])->name('login');
    Route::post('/checkAuth', [AuthController::class, "authenticate"]);
});
// Session Out Routes End