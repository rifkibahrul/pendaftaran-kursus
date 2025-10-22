<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseStudentController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Models\CourseStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/details/{course:slug}', [FrontController::class, 'details'])->name('front.details'); 
Route::get('/category/{category:slug}', [FrontController::class, 'category'])->name('front.category');

Route::get('/dashboard', function () {
    if (Auth::user()->isOwner()) {
        return redirect()->route('owner.courses.index');
    }
    return redirect()->route('student.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Owner routes
Route::prefix('owner')->name('owner.')->group(function () {
    Route::resource('categories', CategoryController::class)->middleware(['auth','owner']);
    Route::resource('courses', CourseController::class)->middleware(['auth','owner']);
});

// Student routes
Route::prefix('student')->name('student.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [CourseStudentController::class, 'dashboard'])->name('dashboard');
    Route::get('/my-courses', [CourseStudentController::class, 'myCourses'])->name('my-courses');
    Route::post('/enroll/{course}', [CourseStudentController::class, 'enroll'])->name('enroll');    //--> Ketika student melakukan checkout
});


require __DIR__.'/auth.php';
