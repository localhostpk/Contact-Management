<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\UserContactController;
use App\Http\Controllers\Admin\QRController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SettingController;
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

// Route::get('/dashboard', function () {
   
   
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');
Route::get('/dashboard',[AdminController::class,'dashboard'])->middleware(['auth'])->name('dashboard');

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

//QR CODE Link  Genrate
Route::get('generate-link-qrcode/{id}',[UserController::class,'generate'])->name('generate.qr_code.user');
// edit CODE Link
Route::post('edit-link-qrcode/{id}',[UserController::class,'edit_qr_link'])->name('edit.qr_code.user');
Route::get('edit-link-qrcode/{id}',[UserController::class,'view_edit_qr_link'])->name('edit.qr_code.user');


Route::get('generate_qr_code',[QRController::class,'create'])->name('generate.qr_code');
Route::post('generate_qr_code',[QRController::class,'store'])->name('generate.qr_code');
Route::get('all_qr_codes',[QRController::class,'index'])->name('all.qr_codes');

//Contact
Route::get('add-contact',[ContactController::class,'create'])->name('add.contact');
Route::post('add-contact',[ContactController::class,'store'])->name('add.contact');
Route::get('all-contact',[ContactController::class,'index'])->name('all.contact');

Route::get('edit-contact/{id}',[ContactController::class,'edit'])->name('edit.contact');
Route::post('edit-contact/{id}',[ContactController::class,'update'])->name('update.contact');
Route::get('delete-contact/{id}',[ContactController::class,'destroy'])->name('destroy.contact');


//outsite contact
Route::get('add-usercontact/{token}',[UserContactController::class,'create'])->name('add.usercontact');
Route::post('add-usercontact/{token}',[UserContactController::class,'store'])->name('add.usercontact');


//QR Code view
Route::get('qrcode/{token}' ,[UserContactController::class,'viewQR'])->name('qr_code.view');


//Admin Profile sitting
Route::get('profile',[ProfileController::class,'create'])->name('profile.create');
Route::post('profile',[ProfileController::class,'store'])->name('profile.create');



Route::get('contact_add', function () {
    return view('contact_add');
});


//USer Tree View 
Route::get('user-tree-view',[UserController::class,'user_tree_view'])->name('user.tree.view');

//Contact Tree View 
Route::get('contact-tree-view',[ContactController::class,'contact_tree_view'])->name('contact.tree.view');

//Admin Dashboard Settings

//profile details
Route::get('project-setting',[SettingController::class,'project_details'])->name('add.project.details');
Route::post('project-setting',[SettingController::class,'add_project_details'])->name('add.project.details');
Route::get('all-project-setting',[SettingController::class,'all_project_details'])->name('all.project.details');
Route::get('edit-project-setting/{id}',[SettingController::class,'edit_project_details'])->name('edit.project.details');
Route::post('edit-project-setting/{id}',[SettingController::class,'update_project_details'])->name('update.project.details');
Route::get('delete-project-setting/{id}',[SettingController::class,'project_details_destroy'])->name('delete.project.details');

//Smtp in dashboard
Route::get('add_smtp_details',[SettingController::class,'smtp_details'])->name('add.smtp.details');
Route::post('add_smtp_details',[SettingController::class,'store_smtp_details'])->name('add.smtp.details');
Route::get('all-smtp-details',[SettingController::class,'all_smtp_details'])->name('all.smtp.details');
Route::get('edit-smtp-details/{id}',[SettingController::class,'edit_smtp_details'])->name('edit.smtp.details');
Route::post('edit-smtp-details/{id}',[SettingController::class,'update_smtp_details'])->name('update.smtp.details');
Route::get('delete-smtp-details/{id}',[SettingController::class,'project_smtp_destroy'])->name('delete.smtp.details');

//Maintencance
Route::get('maintenance',[SettingController::class,'maintenance'])->name('maintenance');
Route::post('maintenance',[SettingController::class,'storemaintenance'])->name('maintenance');