<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/admin',[AdminController::class,'index']);
Route::get('logout',[AuthenticatedSessionController::class,'destroy']);
//roles
Route::get('create-role',[RoleController::class,'createrole'])->name('create.role');
Route::post('create-role',[RoleController::class,'storerole'])->name('create.role');
Route::get('asign-role',[RoleController::class,'assignroleform'])->name('assign.role');
Route::post('asign-role',[RoleController::class,'assignrole'])->name('assign.role');
Route::get('all-role',[RoleController::class,'allrole'])->name('all.role');

//Permission
Route::get('create-permission',[PermissionController::class,'createpermission'])->name('create.permission');
Route::post('create-permission',[PermissionController::class,'storepermission'])->name('create.permission');
Route::get('assign-permission',[PermissionController::class,'assignpermissionform'])->name('assign.permission');
Route::post('assign-permission',[PermissionController::class,'assignpermission'])->name('assign.permission');
Route::get('all-permission',[PermissionController::class,'allpermission'])->name('all.permission');