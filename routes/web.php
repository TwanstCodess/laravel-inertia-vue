<?php
use App\Http\Controllers\Admin\Userscontroller;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return inertia('home');
});
Route::get('/about', function () {
    return inertia('about');
});
Route::get('/contact', function () {
    return inertia('contact');
});

// admin
Route::prefix('admin')->group(function () {
Route::resource('user', UsersController::class);

});
