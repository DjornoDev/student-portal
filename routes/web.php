<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StudentController;

// Redirect root to login page
Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {

    // Admin and Super Admin Dashboard
    Route::middleware(['auth', 'role:super_admin'])->group(function () {
        Route::get('/admins', [AdminController::class, 'index'])->name('admins.dashboard');
        Route::get('/admins/subject', [AdminController::class, 'subject'])->name('admins.subject');
        Route::get('/admins/schedule', [AdminController::class, 'schedule'])->name('admins.schedule');
        Route::get('/admins/noticeboard', [AdminController::class, 'noticeboard'])->name('admins.noticeboard');
        Route::get('/admins/teacher', [AdminController::class, 'teacher'])->name('admins.teacher');
    });


    // Student Dashboard
    // Route::get('/student', [StudentController::class, 'index'])
    //     ->middleware('role:student')
    //     ->name('student_dashboard');
});

// routes/web.php

// Routes for student dashboard
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student', [StudentController::class, 'dashboard'])->name('student.dashboard');
});

// Routes for admin student management
Route::middleware(['auth', 'role:super_admin'])->group(function () {
    Route::get('/admins/student', [StudentController::class, 'index'])->name('admins.student');
    Route::post('/admins/student', [StudentController::class, 'store'])->name('admin.student.store');
    Route::get('/admins/student/{student}', [StudentController::class, 'show'])->name('admin.student.show');
    Route::put('/admins/student/{student}', [StudentController::class, 'update'])->name('admin.student.update');
    Route::delete('/admins/student/{student}', [StudentController::class, 'destroy'])->name('admin.student.destroy');
});
