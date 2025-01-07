<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return view('Welcome');
});

Route::get('/api/tasks', [TaskController::class, 'index'])->name('tasks.index');
Route::patch('/api/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::post('/api/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::post('/api/tasks/create', [TaskController::class, 'create'])->name('tasks.create');
Route::get('/tasks', function () {
    return Inertia::render('Tasks', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
