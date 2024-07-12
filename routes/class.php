<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\ClassController;


//Class
Route::get('/admin/class/index', [ClassController::class, 'index'])->name('admin.class.index');
Route::get('/admin/class/create', [ClassController::class, 'create'])->name('admin.class.create');
Route::post('/admin/class/store', [ClassController::class, 'store'])->name('admin.class.store');
Route::get('/admin/class/edit/{id}', [ClassController::class, 'edit'])->name('admin.class.edit');
Route::post('/admin/class/update/{id}', [ClassController::class, 'update'])->name('admin.class.update');
Route::get('/admin/class/delete/{id}', [ClassController::class, 'delete'])->name('admin.class.delete');
