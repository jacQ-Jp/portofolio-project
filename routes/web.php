<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SkillController;

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('register.store')->middleware('guest');

// Use the standard route name Laravel expects for auth redirects
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.store')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('ensure.auth');

// Portfolio + CRUD (protected)
Route::middleware('ensure.auth')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects.index');

    // Projects
    Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');

    // Skills
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills/create', [SkillController::class, 'create'])->name('skills.create');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
});
