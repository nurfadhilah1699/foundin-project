<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminCommentController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminTagController;
use App\Http\Controllers\Admin\SearchController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

    //Search 
    Route::get('/admin/search', [SearchController::class, 'index'])->name('admin.search.index');

    //Users
    Route::get('/admin/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('/admin/users', [AdminUserController::class, 'store'])->name('admin.users.store');
    Route::post('/admin/users/verify-email', [AdminUserController::class, 'verifyEmail'])->name('admin.users.verifyEmail');
    Route::put('/admin/users/{id}', [AdminUserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{id}', [AdminUserController::class, 'destroy'])->name('admin.users.destroy');

    //Posts
    Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
    Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');
    Route::put('/admin/posts/{id}', [AdminPostController::class, 'update'])->name('admin.posts.update');
    Route::delete('/admin/posts/{id}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

    //Comments
    Route::get('/admin/comments', [AdminCommentController::class, 'index'])->name('admin.comments.index');
    Route::delete('/admin/comments/{id}', [AdminCommentController::class, 'destroy'])->name('admin.comments.destroy');

    //Categories
    Route::get('/admin/categories', [AdminCategoryController::class, 'index'])->name('admin.categories.index');
    Route::post('/admin/categories', [AdminCategoryController::class, 'store'])->name('admin.categories.store');
    Route::put('/admin/categories/{id}', [AdminCategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/admin/categories/{id}', [AdminCategoryController::class, 'destroy'])->name('admin.categories.destroy');

    Route::get('/admin/tags', [AdminTagController::class, 'index'])->name('admin.tags.index');
    Route::post('/admin/tags', [AdminTagController::class, 'store'])->name('admin.tags.store');
    Route::put('/admin/tags/{id}', [AdminTagController::class, 'update'])->name('admin.tags.update');
    Route::delete('/admin/tags/{id}', [AdminTagController::class, 'destroy'])->name('admin.tags.destroy');
}); 


Route::middleware(['auth', 'verified'])->group(function () {
    //Post Content
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

    //Post Comment
    Route::post('/posts/{post}/comments', [PostController::class, 'storeComment'])->name('posts.comments.store');
});

//=== User Post, Comment and Explore ===//
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/explore', [PostController::class, 'explore'])->name('explore');

require __DIR__.'/auth.php';
