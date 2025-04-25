<?php

use App\Http\Controllers\Admin\AdminPostController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminUserController;
use Illuminate\Http\Request;

//=== Verifikasi email ===//
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

//=== Homepage ===//
Route::get('/', [PostController::class, 'getRecentPosts'])->name('home');

//=== Admin Routes ===//
Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.admin-dashboard'); })->name('dashboard');

    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
}); 


Route::middleware(['auth', 'verified'])->group(function () {
    //Profile
    Route::get('/profile', function () {
        // Hanya pengguna yang terverifikasi yang dapat mengakses rute ini
    });

});

Route::middleware('auth')->group(function () {
    //Email Verification 
    Route::get('/email/verify', function () {
        return view('auth.verify-email');})->name('verification.notice');

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    //Post Content
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});

//=== User Post, Comment and Explore ===//
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/explore', [PostController::class, 'explore'])->name('explore');

Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('posts.comments.store');

require __DIR__.'/auth.php';
