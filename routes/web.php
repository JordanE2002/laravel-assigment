<?php

use Illuminate\Support\Facades\Route;
use resources\views\auth\info\employees;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompaniesController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





// Employees Page Route
Route::get('/employees', function () {
    return view('auth.info.employees'); // Ensure the view file exists
})->name('employees');


Route::get('/companies', function () {
    return view('auth.info.companies'); // Ensure the view file exists
})->name('companies');


Route::get('/employees', [EmployeesController::class, 'index'])->name('employees');

Route::get('/companies', [CompaniesController::class, 'index'])->name('companies');