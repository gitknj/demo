<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CronController;
use App\Http\Controllers\Vendor\VendorController;
use App\Http\Controllers\Vendor\VendorBusinessDetailController;
use App\Models\Admin;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('admin/login',[AdminController::class,'login'])->name('admin.login');


Route::group(['middleware'=>'admin'],function(){
    Route::get('admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
    Route::post('admin/logout',[AdminController::class,'logout'])->name('admin.logout');
    Route::get('admin/changepassword',[AdminController::class,'changepwd'])->name('admin.changepassword');
    Route::post('admin/changepassword',[AdminController::class,'changepwdpost'])->name('admin.changepasswordpost');
    Route::get('admin/updateprofile',[AdminController::class,'updateprofile'])->name('admin.updateprofile');
    Route::post('admin/updateprofile',[AdminController::class,'updateprofilepost'])->name('admin.updateprofilepost');
    Route::get('admin/changepassword/success',[AdminController::class,'logout'])->name('admin.changepasswordsuccess');
});

Route::get('vendor/login',[VendorController::class,'login'])->name('vendor.login');
Route::post('vendor/login',[VendorController::class,'loginpost'])->name('vendor.loginpost');
Route::get('vendor/register',[VendorController::class,'register'])->name('vendor.register');
Route::post('vendor/register',[VendorController::class,'registerpost'])->name('vendor.registerpost');


Route::group(['middleware'=>'vendor'],function(){
    Route::get('vendor/dashboard',[VendorController::class,'dashboard'])->name('vendor.dashboard');
    Route::get('vendor/registerBusinessDetail',[VendorBusinessDetailController::class,'register_business_detail'])->name('vendor.registerBusinessDetail');
    Route::post('vendor/registerBusinessDetail',[VendorBusinessDetailController::class,'register_business_detail_post'])->name('vendor.registerBusinessDetailPost');
    Route::post('vendor/logout',[VendorController::class,'logout'])->name('vendor.logout');
    Route::get('vendor/logout',[VendorController::class,'logout'])->name('vendor.logout');
});

Route::get('/cronval',CronController::class);