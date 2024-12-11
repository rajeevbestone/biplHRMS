<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterController;

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

// Session In Routes Start
Route::middleware('SessionInCheck')->group(function(){
    Route::get('/logout', [AuthController::class, "authOut"])->name('logout');
    Route::get('/dashboard', [DashboardController::class, "showDashboard"])->name('dashboard');

    // ------ Master Routes Starts

    Route::get("/master/branch/list", [MasterController::class, "branchList"])->name("branchList");
    Route::get("/master/branch/create", [MasterController::class, "branchCreate"])->name("branchCreate");
    Route::get("/master/branch/update/{id}", [MasterController::class, "branchUpdate"])->name("branchUpdate");
    Route::post("/master/branch/createDo", [MasterController::class, "branchCreateDo"]);
    Route::post("/master/branch/updateDo", [MasterController::class, "branchUpdateDo"]);
    
    Route::get("/master/department/list", [MasterController::class, "departmentList"])->name("branchList");
    Route::get("/master/department/create", [MasterController::class, "departmentCreate"])->name("branchCreate");
    Route::get("/master/department/update/{id}", [MasterController::class, "departmentUpdate"])->name("branchUpdate");
    Route::post("/master/department/createDo", [MasterController::class, "departmentCreateDo"]);
    Route::post("/master/department/updateDo", [MasterController::class, "departmentUpdateDo"]);
    
    // ------ Master Routes Ends

});
// Session In Routes End

// Session Out Routes Start
Route::middleware('SessionOutCheck')->group(function(){
    Route::get('/', [AuthController::class, "showLoginForm"])->name('login');
    Route::post('/checkAuth', [AuthController::class, "authenticate"]);
});
// Session Out Routes End