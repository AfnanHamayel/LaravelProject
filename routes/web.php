<?php

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

Auth::routes(['register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware('auth:employees')->group(function(){

    Route::get('/leave', [App\Http\Controllers\EmployeeLeaveController::class, 'index'])->name('emp_leave');
    Route::get('/leave/create', [App\Http\Controllers\EmployeeLeaveController::class, 'create'])->name('emp_create_leave');
    Route::post('/leave/store', [App\Http\Controllers\EmployeeLeaveController::class, 'store'])->name('emp_new_leave');
    
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
    Route::put('/profile/update', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

});

Route::prefix('admin')->group(function(){
    Route::get('/login', [App\Http\Controllers\Admin\LoginController::class, 'index'])->name('admin.login');
    Route::post('/login', [App\Http\Controllers\Admin\LoginController::class, 'login'])->name('admin.login.do');

    Route::middleware('auth:admin')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
  
    Route::get('/departments', [App\Http\Controllers\Admin\DepartmentController::class, 'index'])->name('admin.department');
    Route::get('/department/create', [App\Http\Controllers\Admin\DepartmentController::class, 'create'])->name('admin.department.create');
    Route::post('/department/store', [App\Http\Controllers\Admin\DepartmentController::class, 'store'])->name('admin.department.store');
    Route::get('/department/{department}/edit', [App\Http\Controllers\Admin\DepartmentController::class, 'edit'])->name('admin.department.edit');
    Route::put('/department/{department}/update', [App\Http\Controllers\Admin\DepartmentController::class, 'update'])->name('admin.department.update');
    Route::get('/department/{department}/delete', [App\Http\Controllers\Admin\DepartmentController::class, 'destroy'])->name('admin.department.delete');

    Route::get('/leaves', [App\Http\Controllers\Admin\LeaveController::class, 'index'])->name('admin.leaves');
    Route::get('/leave/create', [App\Http\Controllers\Admin\LeaveController::class, 'create'])->name('admin.leaves.create');
    Route::post('/leave/store', [App\Http\Controllers\Admin\LeaveController::class, 'store'])->name('admin.leaves.store');
    Route::get('/leave/{leaveType}/edit', [App\Http\Controllers\Admin\LeaveController::class, 'edit'])->name('admin.leaves.edit');
    Route::put('/leave/{leaveType}/update', [App\Http\Controllers\Admin\LeaveController::class, 'update'])->name('admin.leaves.update');
    Route::get('/leave/{leaveType}/delete', [App\Http\Controllers\Admin\LeaveController::class, 'destroy'])->name('admin.leaves.delete');

    Route::get('/employees', [App\Http\Controllers\Admin\EmployeeController::class, 'index'])->name('admin.employees');
    Route::get('/employee/create', [App\Http\Controllers\Admin\EmployeeController::class, 'create'])->name('admin.employees.create');
    Route::post('/employee/store', [App\Http\Controllers\Admin\EmployeeController::class, 'store'])->name('admin.employees.store');
    Route::get('/employee/{employee}/edit', [App\Http\Controllers\Admin\EmployeeController::class, 'edit'])->name('admin.employees.edit');
    Route::put('/employee/{employee}/update', [App\Http\Controllers\Admin\EmployeeController::class, 'update'])->name('admin.employees.update');
    Route::get('/employee/{employee}/delete', [App\Http\Controllers\Admin\EmployeeController::class, 'destroy'])->name('admin.employees.delete');

    Route::get('/request/leaves', [App\Http\Controllers\Admin\RequestLeaveController::class, 'index'])->name('admin.request.leaves');
    Route::get('/request/leaves/{id}/accept', [App\Http\Controllers\Admin\RequestLeaveController::class, 'AcceptLeave'])->name('admin.leave.accept');
    Route::get('/request/leaves/{id}/rejected', [App\Http\Controllers\Admin\RequestLeaveController::class, 'RejectedLeave'])->name('admin.leave.rejected');
    
    Route::get('/profile', [App\Http\Controllers\Admin\ProfileController::class, 'index'])->name('admin.profile');
    Route::put('/profile/update', [App\Http\Controllers\Admin\ProfileController::class, 'update'])->name('admin.profile.update');

    });
});