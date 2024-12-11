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
    
    Route::get("/master/department/list", [MasterController::class, "departmentList"])->name("departmentList");
    Route::get("/master/department/create", [MasterController::class, "departmentCreate"])->name("departmentCreate");
    Route::get("/master/department/update/{id}", [MasterController::class, "departmentUpdate"])->name("departmentUpdate");
    Route::post("/master/department/createDo", [MasterController::class, "departmentCreateDo"]);
    Route::post("/master/department/updateDo", [MasterController::class, "departmentUpdateDo"]);

    Route::get("/master/designation/list", [MasterController::class, "designationList"])->name("designationList");
    Route::get("/master/designation/create", [MasterController::class, "designationCreate"])->name("designationCreate");
    Route::get("/master/designation/update/{id}", [MasterController::class, "designationUpdate"])->name("designationUpdate");
    Route::post("/master/designation/createDo", [MasterController::class, "designationCreateDo"]);
    Route::post("/master/designation/updateDo", [MasterController::class, "designationUpdateDo"]);

    Route::get("/master/leave/list", [MasterController::class, "leaveList"])->name("leaveList");
    Route::get("/master/leave/create", [MasterController::class, "leaveCreate"])->name("leaveCreate");
    Route::get("/master/leave/update/{id}", [MasterController::class, "leaveUpdate"])->name("leaveUpdate");
    Route::post("/master/leave/createDo", [MasterController::class, "leaveCreateDo"]);
    Route::post("/master/leave/updateDo", [MasterController::class, "leaveUpdateDo"]);

    Route::get("/master/shift/list", [MasterController::class, "shiftList"])->name("shiftList");
    Route::get("/master/shift/create", [MasterController::class, "shiftCreate"])->name("shiftCreate");
    Route::get("/master/shift/update/{id}", [MasterController::class, "shiftUpdate"])->name("shiftUpdate");
    Route::post("/master/shift/createDo", [MasterController::class, "shiftCreateDo"]);
    Route::post("/master/shift/updateDo", [MasterController::class, "shiftUpdateDo"]);

    Route::get("/master/employeeManagement/list", [MasterController::class, "employeeManagementList"])->name("employeeManagementList");
    Route::get("/master/employeeManagement/onboard", [MasterController::class, "employeeManagementOnboard"])->name("employeeManagementOnboard");
    Route::get("/master/employeeManagement/update/{id}", [MasterController::class, "employeeManagementUpdate"])->name("employeeManagementUpdate");
    Route::post("/master/employeeManagement/onboardDo", [MasterController::class, "employeeManagementOnboardDo"]);
    Route::post("/master/employeeManagement/updateDo", [MasterController::class, "employeeManagementUpdateDo"]);

    Route::get("/master/session/list", [MasterController::class, "sessionList"])->name("sessionList");
    Route::get("/master/session/create", [MasterController::class, "sessionCreate"])->name("sessionCreate");
    Route::get("/master/session/update/{id}", [MasterController::class, "sessionUpdate"])->name("sessionUpdate");
    Route::post("/master/session/createDo", [MasterController::class, "sessionCreateDo"]);
    Route::post("/master/session/updateDo", [MasterController::class, "sessionUpdateDo"]);
    
    

    // ------ Master Routes Ends

});
// Session In Routes End

// Session Out Routes Start
Route::middleware('SessionOutCheck')->group(function(){
    Route::get('/', [AuthController::class, "showLoginForm"])->name('login');
    Route::post('/checkAuth', [AuthController::class, "authenticate"]);
});
// Session Out Routes End