<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\UserController;
use App\Models\Admin;
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

Route::get('/', [FrontController::class,'index']);
Route::get('/about', [FrontController::class,'about']);
Route::get('/contact', [FrontController::class,'contact']);
Route::get('/category/{id}', [FrontController::class,'category']);
Route::get('/subcategory/{id}', [FrontController::class,'details']);
Route::post('/login/auth',[FrontController::class,'auth']);
Route::post('/orderInsert',[FrontController::class,'insert'])->name('forder.insert');
Route::get('/product/{id}', [FrontController::class,'productdetails']);
// Staffs Route
Route::prefix('staff')->group(function () {
    Route::redirect('/', '/staff/login');
    Route::get('/login',[StaffController::class,'login']);
    Route::post('/auth',[StaffController::class,'auth'])->name('staff.auth');
    Route::get('/dashboard',[StaffController::class,'dashboard'])->middleware('staff_auth');
    Route::get('/order',[OrderController::class,'index'])->middleware('staff_auth');
    Route::get('/order/create',[OrderController::class,'create'])->middleware('staff_auth');
    Route::post('/order/insert',[OrderController::class,'insert'])->name('order.insert')->middleware('staff_auth');
    Route::get('/order/edit/{id}',[OrderController::class,'edit'])->middleware('staff_auth');
    Route::get('/order/view/{id}',[OrderController::class,'view'])->middleware('staff_auth');
    Route::get('/order/pdf/{id}',[OrderController::class,'pdf'])->middleware('staff_auth');
    Route::get('/order/delete/{id}',[OrderController::class,'delete'])->middleware('staff_auth');
    Route::get('/order/request/{id}',[OrderController::class,'requests'])->middleware('staff_auth');
    Route::post('/order/update',[OrderController::class,'update'])->name('order.update')->middleware('staff_auth');
    Route::get('/logout',function(){
        session()->forget('STAFF_LOGIN');
        session()->forget('STAFF_ID');
        session()->forget('STAFF_USERNAME');
        session()->forget('STAFF_EMAIL');
        session()->forget('STAFF_ROLE');
        session()->forget('icon');
        session()->forget('msg');
        session()->flash('icon','success');
        session()->flash('msg','Logout Successfully');
        return redirect('/staff/login');
    });
});


// End Users Route

Route::prefix('admin')->group(function () {

    // Register
    Route::get('/register',[AdminController::class,'register']);
    Route::post('/add_registter',[AdminController::class,'add_registter'])->name('admin.register');
    // Orders
    Route::get('/order/assign/{id}',[OrderController::class,'admin_order_assign'])->middleware('admin_auth');
    Route::post('/order/assign',[OrderController::class,'admin_order_assigns'])->name('order.assign')->middleware('admin_auth');
    Route::get('/order_list',[OrderController::class,'admin_order_list'])->middleware('admin_auth');
    Route::get('/order/view/{id}',[OrderController::class,'admin_order_view'])->middleware('admin_auth');
    Route::get('/order/delete/{id}',[OrderController::class,'admin_order_delete'])->middleware('admin_auth');
    Route::get('/request',[OrderController::class,'admin_request_list'])->middleware('admin_auth');
    Route::get('/request/approve/{id}',[OrderController::class,'admin_request_approve'])->middleware('admin_auth');

    // Role 
    Route::get('/role',[RoleController::class,'index'])->middleware('admin_auth');
    Route::get('/role/create',[RoleController::class,'create'])->middleware('admin_auth');
    Route::post('/role/insert',[RoleController::class,'insert'])->name('role.insert')->middleware('admin_auth');
    Route::get('/role/edit/{id}',[RoleController::class,'edit'])->middleware('admin_auth');
    Route::post('/role/update',[RoleController::class,'update'])->name('role.update')->middleware('admin_auth');
    Route::get('/role/delete/{id}',[RoleController::class,'delete'])->middleware('admin_auth');
    // Route::get('/users',[UserController::class,'index'])->middleware('admin_auth');

    //Category 
    Route::get('/category',[CategoryController::class,'index'])->middleware('admin_auth');
    Route::get('/category/create',[CategoryController::class,'create'])->middleware('admin_auth');
    Route::post('/category/create',[CategoryController::class,'store'])->name('category.insert')->middleware('admin_auth');
    Route::get('/category/view/{id}',[CategoryController::class,'view'])->middleware('admin_auth');
    Route::get('/category/edit/{id}',[CategoryController::class,'edit'])->middleware('admin_auth');
    Route::post('/category/update',[CategoryController::class,'update'])->name('category.update')->middleware('admin_auth');
    Route::get('/category/delete/{id}',[CategoryController::class,'delete'])->middleware('admin_auth');

    //Subcategory 
    Route::get('/subcategory',[SubcategoryController::class,'index'])->middleware('admin_auth');
    Route::get('/subcategory/create',[SubcategoryController::class,'create'])->middleware('admin_auth');
    Route::post('/subcategory/create',[SubcategoryController::class,'store'])->name('subcategory.insert')->middleware('admin_auth');
    Route::get('/subcategory/view/{id}',[SubcategoryController::class,'view'])->middleware('admin_auth');
    Route::get('/subcategory/edit/{id}',[SubcategoryController::class,'edit'])->middleware('admin_auth');
    Route::post('/subcategory/update',[SubcategoryController::class,'update'])->name('subcategory.update')->middleware('admin_auth');
    Route::get('/subcategory/delete/{id}',[SubcategoryController::class,'delete'])->middleware('admin_auth');



    // Product
    Route::get('/product',[ProductController::class,'index'])->middleware('admin_auth');    
    Route::get('/product/create',[ProductController::class,'create'])->middleware('admin_auth');    
    Route::post('/product/insert',[ProductController::class,'insert'])->name('product.insert')->middleware('admin_auth');
    Route::get('/product/edit/{id}',[ProductController::class,'edit'])->middleware('admin_auth');
    Route::post('/product/update',[ProductController::class,'update'])->name('product.update')->middleware('admin_auth');
    Route::get('/product/delete/{id}',[ProductController::class,'delete'])->middleware('admin_auth');
    Route::get('/product/fetchSubcat/{id}',[ProductController::class,'fetchSubcat'])->middleware('admin_auth');
    Route::get('/product/fetchSubcate/{id}',[ProductController::class,'fetchSubcate'])->middleware('admin_auth');

    Route::redirect('/', '/admin/login');
    Route::get('/login',[AdminController::class,'login']);
    Route::post('/auth',[AdminController::class,'auth'])->name('admin.auth');
    Route::get('/dashboard',[AdminController::class,'index'])->middleware('admin_auth');
    Route::get('/staff',[StaffController::class,'index'])->middleware('admin_auth');
    Route::get('/staff/create',[StaffController::class,'create'])->middleware('admin_auth');
    Route::post('/staff/insert',[StaffController::class,'store'])->name('staff.insert')->middleware('admin_auth');
    Route::get('/staff/edit/{id}',[StaffController::class,'edit'])->middleware('admin_auth');
    Route::post('/staff/update',[StaffController::class,'update'])->name('user.update')->middleware('admin_auth');
    Route::get('staff/change_status/{id}',[StaffController::class,'change_status'])->middleware('admin_auth');
    Route::get('/logout',function(){
                session()->forget('ADMIN_LOGIN');
                session()->forget('ADMIN_ID');
                session()->forget('ADMIN_NAME');
                session()->forget('ADMIN_EMAIL');
                session()->flash('icon','success');
                session()->flash('msg','Logout Successfully');
                return redirect('admin/login');
    });
});