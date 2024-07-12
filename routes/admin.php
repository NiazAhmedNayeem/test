<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\StudentController;

//Backend Dashboard
Route::get('/admin/dashboard', [BackendController::class, 'index'])->name('admin.dashboard');

//Student
Route::get('/admin/student/index', [StudentController::class, 'index'])->name('admin.student.index');
Route::get('/admin/student/create', [StudentController::class, 'create'])->name('admin.student.create');
Route::post('/admin/student/store', [StudentController::class, 'store'])->name('admin.student.store');
Route::get('/admin/student/edit/{id}', [StudentController::class, 'edit'])->name('admin.student.edit');
Route::post('/admin/student/update/{id}', [StudentController::class, 'update'])->name('admin.student.update');
Route::get('/admin/student/delete/{id}', [StudentController::class, 'delete'])->name('admin.student.delete');
