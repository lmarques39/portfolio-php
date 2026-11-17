<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/projetos', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projetos/{project}', [ProjectController::class, 'show'])->name('projects.show');
