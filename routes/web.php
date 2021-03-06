<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GroupController;
use App\Http\Middleware\CheckAdminMiddleware;
use App\Http\Middleware\CheckLoginMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', static function() {
    return redirect()->route('login');
});
Route::get('/login', [AuthController::class, 'loginView'])->name('login_view');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group([
    'prefix' => 'api',
    'as' => 'api.',
    'middleware' => CheckLoginMiddleware::class
], static function() {
    Route::get('/', [ApiController::class, 'index'])->name('index');

    Route::group(['middleware' => CheckAdminMiddleware::class], static function() {
        Route::get('/create', [ApiController::class, 'create'])->name('create');
        Route::post('/store', [ApiController::class, 'store'])->name('store');
        Route::get('/edit/{api}', [ApiController::class, 'edit'])->name('edit');
        Route::put('/update/{api}', [ApiController::class, 'update'])->name('update');
    });

});


Route::get('/group', [GroupController::class, 'index'])->name('group');
