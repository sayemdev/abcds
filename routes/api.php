<?php
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CultureController;
use App\Http\Controllers\CultureOptionController;
use App\Http\Controllers\CulturePriceController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\TestPriceController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeVisitController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\AntibioticController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TimesheetController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\OvertimeController;
use App\Http\Controllers\LeaveSettingController;
use App\Http\Controllers\CustomPolicyController;



Route::prefix('contracts')->group(function () {
    Route::get('/', [ContractController::class, 'index']);
    Route::post('/', [ContractController::class, 'store']);
    Route::get('/{id}', [ContractController::class, 'show']);
    Route::put('/{contract}', [ContractController::class, 'update']);
    Route::delete('/{id}', [ContractController::class, 'destroy']);
});

Route::prefix('patients')->group(function () {
    Route::get('/', [PatientController::class, 'index']);
    Route::post('/', [PatientController::class, 'store']);
    Route::get('/{patient}', [PatientController::class, 'show']);
    Route::put('/{patient}', [PatientController::class, 'update']);
    Route::delete('/{patient}', [PatientController::class, 'destroy']);
});

Route::prefix('visits')->group(function () {
    Route::get('/', [HomeVisitController::class, 'index']);
    Route::post('/', [HomeVisitController::class, 'store']);
    Route::get('/{homeVisit}', [HomeVisitController::class, 'show']);
    Route::put('/{homeVisit}', [HomeVisitController::class, 'update']);
    Route::delete('/{homeVisit}', [HomeVisitController::class, 'destroy']);
});


Route::prefix('roles')->group(function () {
    Route::get('/', [RoleController::class, 'index']);
    Route::post('/', [RoleController::class, 'store']);
    Route::get('/{role}', [RoleController::class, 'show']);
    Route::put('/{role}', [RoleController::class, 'update']);
    Route::delete('/{role}', [RoleController::class, 'destroy']);
});

Route::prefix('permissions')->group(function () {
    Route::get('/', [PermissionController::class, 'index']);
    Route::post('/', [PermissionController::class, 'store']);
    Route::get('/{permission}', [PermissionController::class, 'show']);
    Route::put('/{permission}', [PermissionController::class, 'update']);
    Route::delete('/{permission}', [PermissionController::class, 'destroy']);
});

Route::prefix('modules')->group(function () {
    Route::get('/', [ModuleController::class, 'index']);
    Route::get('/edit_role', [ModuleController::class, 'editRolePermisssion']);
    Route::post('/', [ModuleController::class, 'store']);
    Route::get('/{module}', [ModuleController::class, 'show']);
    Route::put('/{module}', [ModuleController::class, 'update']);
    Route::delete('/{module}', [ModuleController::class, 'destroy']);
});

Route::prefix('antibiotics')->group(function () {
    Route::get('/', [AntibioticController::class, 'index']);
    Route::post('/', [AntibioticController::class, 'store']);
    Route::get('/{antibiotic}', [AntibioticController::class, 'show']);
    Route::put('/{antibiotic}', [AntibioticController::class, 'update']);
    Route::delete('/{antibiotic}', [AntibioticController::class, 'destroy']);
});




Route::prefix('departments')->group(function () {
    Route::get('/', [DepartmentController::class, 'index']);
    Route::post('/', [DepartmentController::class, 'store']);
    Route::get('/{department}', [DepartmentController::class, 'show']);
    Route::put('/{department}', [DepartmentController::class, 'update']);
    Route::delete('/{department}', [DepartmentController::class, 'destroy']);
});


Route::prefix('designations')->group(function () {
    Route::get('/', [DesignationController::class, 'index']);
    Route::post('/', [DesignationController::class, 'store']);
    Route::get('/{designation}', [DesignationController::class, 'show']);
    Route::put('/{designation}', [DesignationController::class, 'update']);
    Route::delete('/{designation}', [DesignationController::class, 'destroy']);
});


Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'store']);
    Route::get('/{project}', [ProjectController::class, 'show']);
    Route::put('/{project}', [ProjectController::class, 'update']);
    Route::delete('/{project}', [ProjectController::class, 'destroy']);
});


Route::apiResource('shifts', ShiftController::class);
Route::apiResource('schedules', ScheduleController::class);
Route::apiResource('overtimes', OvertimeController::class);
Route::apiResource('holidays', HolidayController::class);
Route::apiResource('leave-settings', LeaveSettingController::class);
Route::apiResource('custom-policy', CustomPolicyController::class);
Route::apiResource('leave-requests', LeaveRequestController::class);
Route::apiResource('categories', CategoryController::class);
Route::apiResource('tests', TestController::class);
Route::apiResource('test-prices', TestPriceController::class);

Route::apiResource('cultures', CultureController::class);
Route::apiResource('culture-prices', CulturePriceController::class);
Route::apiResource('culture-options', CultureOptionController::class);
Route::apiResource('employees', EmployeeController::class);
Route::apiResource('timesheets', TimesheetController::class);

Route::apiResource('branches', BranchController::class);
Route::apiResource('doctors', DoctorController::class);
Route::apiResource('invoices', InvoiceController::class);
