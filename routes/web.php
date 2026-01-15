<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Transcript\TranscriptController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\CandidateController;

use App\Http\Controllers\Backend\SemesterController;
use App\Http\Controllers\Backend\CourseController;
use App\Http\Controllers\Backend\TeacherController;


//Route::get('/', [HomeController::class, 'index']);

Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');
    echo("Cleared: cache:clear, view:clear, config:clear, route:clear");
});

Route::middleware(['web', 'auth', 'revalidate'])->prefix('candidate')->name('candidate.')->group(function () {
    Route::get('/profile', [TranscriptController::class, 'profile'])->name('profile');
    Route::post('profile', [TranscriptController::class, 'store_profile'])->name('store');
});

Route::middleware(['web', 'auth', 'revalidate'])->prefix('auth')->name('auth.')->group(function () {
    Route::get('/form', [TranscriptController::class, 'create'])->name('create');
    Route::post('/form', [TranscriptController::class, 'store'])->name('store');
    Route::get('/form/{auth}', [TranscriptController::class, 'show'])->name('show');
});

Route::middleware(['web', 'auth', 'revalidate'])->group(function () {
    Route::get('candidate_list', [CandidateController::class, 'candidate_list'])->name('candidate_list');
    Route::get('view_details_member/{id}', [CandidateController::class, 'view_details_member'])->name('view_details_member');
    Route::post('members_approval', [CandidateController::class, 'membersApproval'])->name('members.approve');
});



Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register'])
    ->middleware(['throttle:5,1']); // 5 attempts per minute


// routes/web.php
Route::get('/test-email', function() {
    try {
        Mail::send('backend.email.test', [], function($message) {
            $message->to('imran.ali@du.ac.bd')
                ->subject('Email Configuration Test')
                ->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
        });
        return "Test email sent successfully!";
    } catch (\Exception $e) {
        return "Error: " . $e->getMessage();
    }
});


// new 15.01.2026
Route::prefix('backend')->middleware(['auth'])->group(function () {
    Route::resource('semesters', SemesterController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::prefix('backend')->middleware(['auth'])->group(function () {
    Route::resource('courses', CourseController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});

Route::prefix('backend')->middleware(['auth'])->group(function () {
    Route::resource('teachers', TeacherController::class)
        ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
});
// new
