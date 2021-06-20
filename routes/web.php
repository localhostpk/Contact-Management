<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoleController;
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
Route::get('create-role',[RoleController::class,'createrole'])->name('create.role');
Route::post('create-role',[RoleController::class,'storerole'])->name('create.role');
Route::get('asign-role',[RoleController::class,'assignroleform'])->name('assign.role');
Route::post('asign-role',[RoleController::class,'assignrole'])->name('assign.role');