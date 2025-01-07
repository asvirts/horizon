<?php

use App\Http\Controllers\ProfileController;
use App\Models\Task;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tasks' => Task::all(),
    ]);
});

Route::get('/tasks', function () {
    return Inertia::render('Tasks', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
        'tasks' => Task::orderBy('due_date', 'asc')->get(),
    ]);
});

Route::post('/tasks', function () {
    $task = new Task();
    $task->title = request('title');
    $task->due_date = request('due_date');
    $task->project = request('project');
    $task->assignee = request('assignee');
    $task->priority = 'Test';
    $task->category = 'Test';
    $task->reporter = 'Test';
    $task->status = 'Assigned';

    $task->save();
    return redirect('/tasks');
});

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect('/tasks');
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
