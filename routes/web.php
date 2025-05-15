<?php

use App\Http\Controllers\TodolistController;
use Illuminate\Support\Facades\Route;


Route::get ('/', action: [TodolistController::class, 'todolist'])-> name('home');
Route::get ('/todolist/tambah', action: [TodolistController::class, 'create'])->name('todolist.create');
Route::post('/todolist/tambah/data',action: [TodolistController::class, 'store'])->name('todolist.store');
Route::delete('/todolist/delete/{id}', action: [TodolistController::class, 'destroy'])->name('todolist.destroy');
Route::get('/todolist/edit/{id}', action: [TodolistController::class, 'edit'])->name('todolist.edit');
Route::put('/todolist/data/{id}', action: [TodolistController::class, 'update'])->name('todolist.update');
// Route::get('/profile',function()
// {
//     return view('profile');
// });