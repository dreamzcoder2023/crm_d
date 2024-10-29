<?php

use App\Http\Controllers\Admin\ChangepasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\EquipmentTypeController;
use App\Http\Controllers\Admin\EquipmentModelController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::prefix('server-commands')->group(function () {
    Route::get('optimize', function () {
        \Artisan::call('optimize');
        \Artisan::call('route:clear');
        \Artisan::call('config:clear');
        \Artisan::call('cache:clear');
        \Artisan::call('view:clear');
        dd("Done!");
    });
});


Route::get('/', function () {
    return to_route('login');
});
Auth::routes();
Route::prefix('admin')->as('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('privatedashboard', [DashboardController::class, 'privateDashboard'])->name('privatedashboard');
    Route::post('profileImage', [ProfileController::class, 'profileImage'])->name('profileImage');
    Route::resource('profile', ProfileController::class)->only('edit', 'update')->parameter('profile', 'user');
    Route::resource('settings', SettingsController::class)->only('edit', 'update')->parameter('settings', 'settings');
    Route::resource('changepassword', ChangepasswordController::class)->only('create', 'update')->parameter('changepassword', 'user');
    Route::resource('role', RoleController::class)->except('create', 'show');
    Route::resource('user', UserController::class)->except('show');
    // Equipment routes start
    Route::get('equipment/index',[EquipmentController::class,'index'])->name('equipment.index');
    Route::post('equipment/store',[EquipmentController::class,'store'])->name('equipment.store');
    Route::get('equipment/edit',[EquipmentController::class,'edit'])->name('equipment.edit');
    Route::post('equipment/update/{id}',[EquipmentController::class,'update'])->name('equipment.update');
    Route::post('equipment/delete',[EquipmentController::class,'delete'])->name('equipment.delete');
    // Equipment routes end
     // Equipment type routes start
     Route::get('equipment/type/index',[EquipmentTypeController::class,'index'])->name('equipmenttype.index');
     Route::post('equipment/type/store',[EquipmentTypeController::class,'store'])->name('equipmenttype.store');
     Route::get('equipment/type/edit',[EquipmentTypeController::class,'edit'])->name('equipmenttype.edit');
     Route::post('equipment/type/update/{id}',[EquipmentTypeController::class,'update'])->name('equipmenttype.update');
     Route::post('equipment/type/delete',[EquipmentTypeController::class,'delete'])->name('equipmenttype.delete');
     // Equipment type routes end
      // Equipment model routes start
      Route::get('equipment/model/index',[EquipmentModelController::class,'index'])->name('equipmentmodel.index');
      Route::post('equipment/model/store',[EquipmentModelController::class,'store'])->name('equipmentmodel.store');
      Route::get('equipment/model/edit',[EquipmentModelController::class,'edit'])->name('equipmentmodel.edit');
      Route::post('equipment/model/update/{id}',[EquipmentModelController::class,'update'])->name('equipmentmodel.update');
      Route::post('equipment/model/delete',[EquipmentModelController::class,'delete'])->name('equipmentmodel.delete');
      // Equipment model routes end
      // project model routes start
      Route::get('project/index',[ProjectController::class,'index'])->name('project.index');
      Route::post('project/store',[ProjectController::class,'store'])->name('project.store');
      Route::get('project/edit',[ProjectController::class,'edit'])->name('project.edit');
      Route::post('project/update/{id}',[ProjectController::class,'update'])->name('project.update');
      Route::post('project/delete',[ProjectController::class,'delete'])->name('project.delete');
      // project model routes end
// product model routes start
Route::get('product/index',[ProductController::class,'index'])->name('product.index');
Route::get('product/create',[ProductController::class,'create'])->name('product.create');
Route::post('product/store',[ProductController::class,'store'])->name('product.store');
Route::get('product/edit',[ProductController::class,'edit'])->name('product.edit');
Route::post('product/update/{id}',[ProductController::class,'update'])->name('product.update');
Route::post('product/delete',[ProductController::class,'delete'])->name('product.delete');
Route::get('customerdetails',[ProductController::class,'customer_details'])->name('customer_details');
Route::get('modeldetails',[ProductController::class,'model_details'])->name('model_details');
Route::get('kwdetails',[ProductController::class,'kw_details'])->name('kw_details');
// product model routes end
    Route::get('task', function () {
        return view('admin.task.index');
    })->name('task');
});
