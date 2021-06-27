<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
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
   
    // if(auth()->user()->can('create permission')){
    //     //return 'ad';
    // }
    // // return Auth::user()->getPermissionsViaRoles();
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

Route::get('view-role/{id}',[RoleController::class,'showRole'])->name('view.role');
Route::get('edit-role/{id}',[RoleController::class,'editrole'])->name('edit.role');
Route::post('edit-role/{id}',[RoleController::class,'updaterole'])->name('edit.role');
Route::get('delete-role/{id}',[RoleController::class,'deleterole'])->name('delete.role');

//Permission
Route::get('create-permission',[PermissionController::class,'createpermission'])->name('create.permission');
Route::post('create-permission',[PermissionController::class,'storepermission'])->name('create.permission');
Route::get('assign-permission',[PermissionController::class,'assignpermissionform'])->name('assign.permission');
Route::post('assign-permission',[PermissionController::class,'assignpermission'])->name('assign.permission');
Route::get('all-permission',[PermissionController::class,'allpermission'])->name('all.permission');

Route::get('edit-permission/{id}',[PermissionController::class,'editpermission'])->name('edit.permission');
Route::post('edit-permission/{id}',[PermissionController::class,'updatepermission'])->name('edit.permission');
Route::get('delete-permission/{id}',[PermissionController::class,'deletepermission'])->name('delete.permission');
//User
Route::get('add-user',[UserController::class,'create'])->name('add.user');
Route::post('add-user',[UserController::class,'store'])->name('add.user');
Route::get('all-user',[UserController::class,'index'])->name('all.user');

Route::get('edit-user/{id}',[UserController::class,'edit'])->name('edit.user');
Route::post('edit-user/{id}',[UserController::class,'update'])->name('update.user');
Route::get('delete-user/{id}',[UserController::class,'destroy'])->name('destroy.user');
//Contact
Route::get('add-contact',[ContactController::class,'create'])->name('add.contact');
Route::post('add-contact',[ContactController::class,'store'])->name('add.contact');
Route::get('all-contact',[ContactController::class,'index'])->name('all.contact');

Route::get('edit-contact/{id}',[ContactController::class,'edit'])->name('edit.contact');
Route::post('edit-contact/{id}',[ContactController::class,'update'])->name('update.contact');
Route::get('delete-contact/{id}',[ContactController::class,'destroy'])->name('destroy.contact');