<?php

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RokomiController;
use App\Http\Controllers\KensakuController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/impression', function () {
    return view('impression');
});

Route::get('/Matching', function () {
    return view('Matching');
});

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('storage/Profile/{filename}', function ($filename) {
    $path = storage_path('app/public/Profile/' . $filename);
    
    if (!File::exists($path)) {
        abort(404);
    }
    
    $file = File::get($path);
    $type = File::mimeType($path);
    
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);

    return $response;
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';


Route::get('/profiles/{id}', [ProfileController::class, 'show']);
Route::get('/kensaku', [ProfileController::class, 'kensaku']);
Route::get('/kensaku/{area?}', [KensakuController::class, 'index'])->name('kensaku');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

Route::post('/rokomi/{user_id}/comments', [RokomiController::class, 'store'])->name('rokomi.comments.store');

Route::get('/rokomi/{user_id}', [RokomiController::class, 'index'])->name('rokomi.index');
Route::get('/rokomimiru/{user_id}', [RokomiController::class, 'index'])->name('rokomimiru');
Route::get('/rokomitoukou/{user_id}', [CommentController::class, 'create'])->name('rokomitoukou.create');

Route::delete('/rokomi/comments/{id}', [RokomiController::class, 'destroy'])->name('rokomi.comments.destroy');

