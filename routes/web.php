<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AthleteController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UserController;

Route::get('/', function () {return view('welcome');
});
Route::get('/tentang', function () { return view('tentang'); })->name('tentang');

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'store']);



Route::middleware(['auth'])->group(function () { 
    Route::get('/dashboard', [AthleteController::class, 'dashboard'])->name('dashboard');

    Route::get('/athletes', [AthleteController::class, 'index'])->name('athletes.index');
    Route::get('/athletes/create', [AthleteController::class, 'create']);
    Route::post('/athletes', [AthleteController::class, 'store']);
    Route::get('/athletes/{athlete}/edit', [AthleteController::class, 'edit']);
    Route::put('/athletes/{athlete}', [AthleteController::class, 'update']);   
    Route::delete('/athletes/{athlete}', [AthleteController::class, 'destroy']);
    Route::match(['put', 'patch'], '/profile', [UserController::class, 'updateProfile'])->name('profile.update');
 Route::match(['put', 'patch'], '/password', [UserController::class, 'updatePassword'])->name('password.update');

    Route::get('/profile/edit', [UserController::class, 'editProfile'])->name('profile.edit');
    Route::get('/password/change', [UserController::class, 'changePassword'])->name('password.change');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


    Route::middleware([AdminMiddleware::class])->group(function ()
    {   
        Route::get('/admin/athletes/{athlete}/edit', [AthleteController::class, 'edit']);
        Route::put('/admin/athletes/{athlete}', [AthleteController::class, 'update']);
        Route::delete('/admin/athletes/{athlete}', [AthleteController::class, 'destroy']);
        Route::get('/admin/dashboard', [AdminController::class, 'index']); //dashboard
        Route::get('/admin/user/{id}/approve', [AdminController::class, 'updateStatus'])->where(['id' => '[0-9]+']); //approve user
        Route::get('/admin/user/{id}/reject', [AdminController::class, 'updateStatus'])->where(['id' => '[0-9]+']); //reject user
        Route::get('/admin/athletes/export', [AdminController::class, 'export'])->name('admin.athletes.export');
        Route::get('/admin/users', [AdminController::class, 'indexUser'])->name('admin.users'); //all user
        Route::get('/admin/users/create', [AdminController::class, 'createUser']); //create user view
        Route::post('/admin/users', [AdminController::class, 'storeUser']); //store user
        Route::get('/admin/users/{id}/edit', [AdminController::class, 'editUser'])->where(['id' => '[0-9]+']); //edit user view
        Route::put('/admin/users/{id}', [AdminController::class, 'updateUser'])->where(['id' => '[0-9]+']); //update user
        Route::delete('/admin/users/{id}', [AdminController::class, 'destroyUser'])->where(['id' => '[0-9]+']); //destroy user
        Route::get('/admin/athletes', [AdminController::class, 'athletes'])->name('admin.athletes');
        Route::post('/admin/athletes/{athlete}/mark-paid', [AthleteController::class, 'markPaid'])->name('admin.athletes.markPaid');
    
        
        // Export
    Route::get('/admin/athletes/export', [AdminController::class, 'export'])->name('admin.athletes.export');
    Route::get('/admin/athletes/export/{userId}', [AdminController::class, 'exportByUser'])->name('admin.athletes.exportbyuser');
    Route::get('/file/{filename}', function ($filename) {
        $path = 'public/' . $filename;
    
        if (!Storage::exists($path)) {
            abort(404);
        }
    
        return response()->file(storage_path('app/' . $path));
    })->name('view.file');
    }
    );
});

