<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\ProjectController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('students', StudentController::class);
    Route::resource('topics', TopicController::class);
    Route::get('projects/export', [ProjectController::class, 'export'])->name('projects.export');
    Route::resource('projects', ProjectController::class);
});


require __DIR__.'/auth.php';


use App\Models\Student;
use App\Models\Topic;
use App\Models\Project;

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $studentsCount = Student::count();
        $topicsCount = Topic::count();
        $assignedProjectsCount = Project::where('project_status', '!=', 'declined')->count();
        $totalPaid = Project::sum('amount_paid');
        $totalBalance = Project::sum('balance');

        return view('admin.dashboard', compact('studentsCount', 'topicsCount', 'assignedProjectsCount', 'totalPaid', 'totalBalance'));
    })->name('dashboard');
});
