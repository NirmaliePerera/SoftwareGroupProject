<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\EmployeeRegisterController;
use App\Http\Controllers\Auth\CustomerRegisterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
Use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Mail; 
use App\Http\Controllers\BotController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Common dashboard route if needed
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Admin routes
Route::middleware(['auth', 'admin'])->group(function (){    //'admin' from alias in app.php
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');

    //route buttons for exclusive for admin 
    //Route::get('/employee/register', [EmployeeController::class, 'register'])->name('auth.register');        
    Route::get('/register/employee', [EmployeeRegisterController::class, 'showRegistrationForm'])->name('register.employee');
    Route::post('/register/employee', [EmployeeRegisterController::class, 'register']);

    // Employee details management 
    /**get for retrieving, post for storing, put for updating */
    Route::get('/admin/employee', [EmployeeController::class, 'index'])->name('admin.employee.index');
    Route::get('/admin/employee/create', [EmployeeController::class, 'create'])->name('admin.employee.create');
    Route::post('/admin/employee', [EmployeeController::class, 'store'])->name('admin.employee.store');
    Route::get('/admin/employee/{employee}/edit', [EmployeeController::class, 'edit'])->name('admin.employee.edit');
    Route::put('/admin/employee/{employee}/update', [EmployeeController::class, 'update'])->name('admin.employee.update');
    Route::delete('/admin/employee/{employee}/destroy', [EmployeeController::class, 'destroy'])->name('admin.employee.destroy');
});

//Employee routes
Route::middleware(['auth', 'employee'])->group(function () {    //'employee' from alias in app.php
    Route::get('/employee/dashboard', [EmployeeController::class, 'EmployeeDashboard'])->name('employee.dashboard');

});

// admin and employee  middleware
Route::middleware(['admin_or_employee'])->group(function () {

    //product routes
    Route::get ('/product',[ProductController::class,'index'])->name('product.index');/*path where the view file is located*/
    Route::get ('/product/create',[ProductController::class,'create'])->name('product.create');
    Route::post ('/product',[ProductController::class,'store'])->name('product.store');
    Route::get ('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit'); //edit is the fuction
    Route::put ('/product/{product}/update',[ProductController::class,'update'])->name('product.update'); 
    Route::delete ('/product/{product}/delete',[ProductController::class,'delete'])->name('product.delete');
    
    //appointment routes
    Route::get('appointments', [AppointmentController::class, 'index'])->name('appointments.index');
    Route::get('appointments/{appointment}/edit', [AppointmentController::class, 'edit'])->name('appointments.edit');
    Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
    Route::delete('/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy');

  //Bill routes
  
});

//Customer routes
Route::middleware(['auth', 'customer'])->group(function () {    //'customer' from alias in app.php
    Route::get('/customer', [CustomerController::class, 'customerdashboard'])->name('customer.dashboard');

    // Profile routes for customers
    //need a Home for header
    Route::get('/customer/profile', [CustomerController::class, 'profile'])->name('customer.profile');
    Route::post('/customer/update-profile', [CustomerController::class, 'updateProfile'])->name('customer.updateProfile');
    Route::delete('/customer/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //appointment routes
    Route::get('appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
    Route::post('appointments', [AppointmentController::class, 'store'])->name('appointments.store');
});

/* Publicly accessible routes*/

Route::get('/homepage', [CustomerController::class, 'index'])->name('customer.index');


//Customer sign up
Route::get('/register/customer', [CustomerRegisterController::class, 'showRegistrationForm'])->name('register.customer');
Route::post('/register/customer', [CustomerRegisterController::class, 'register']);



    


//voicebot routes
Route::get('/voice-bot', function () {
    return view('voiceBot.voice_bot');
});

Route::post('/voice-bot-response', [BotController::class, 'getResponse']);

Route::get('/products-list', [ProductController::class, 'index2'])->name('products.list');  
Route::get('/collection-list', [ProductController::class, 'productCollection'])->name('collection.list');
Route::post('add-to-collection', [ProductController::class, 'addProductToCollection'])->name('add-product-to-favourite-collection');
Route::delete('/remove-collection-item', [ProductController::class, 'removeItem'])->name('remove.collection.item');