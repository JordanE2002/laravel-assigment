<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;
use App\Http\Controllers\HomeController;

// Home page
Route::get('/', function () {
    return Auth::check() ? redirect()->route('home') : redirect()->route('login');
});

Auth::routes();

// Home (dashboard) - requires login
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

// Group routes that require authentication
Route::middleware('auth')->group(function () {

    // Employees
    Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');
    Route::get('/employees/create', [EmployeesController::class, 'create'])->name('employees.create');
    Route::post('/employees/store', [EmployeesController::class, 'store'])->name('employees.store');
    Route::get('/employees/{employee}/edit', [EmployeesController::class, 'edit'])->name('employees.edit');
    Route::put('/employees/{employee}', [EmployeesController::class, 'update'])->name('employees.update');
    Route::delete('/employees/{employee}', [EmployeesController::class, 'destroy'])->name('employees.destroy');


    // Companies
    Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');
    Route::delete('/companies/{company}', [CompaniesController::class, 'destroy'])->name('companies.destroy');

Route::get('/companies/create', [CompaniesController::class, 'create'])->name('companies.create');
Route::post('/companies/store', [CompaniesController::class, 'store'])->name('companies.store');

Route::get('/companies/{company}/edit', [CompaniesController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{company}', [CompaniesController::class, 'update'])->name('companies.update');


Route::get('/companies/{company}/employees', [EmployeesController::class, 'employeesByCompany'])->name('companies.employees');




});
