<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Admin\CheckInController;
use App\Http\Controllers\PersonController;
use Illuminate\Support\Facades\Route;

// Default welcome page
// Route::get('/', function () {
//     return view('welcome');
// });

// Welcome page login
Route::get('/', function () {
    return redirect()->route('login');
});

// Auth routes for profile management
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Include authentication routes
require __DIR__.'/auth.php';

// User-specific routes (userMiddleware ensures only users access these)
Route::middleware(['auth', 'userMiddleware'])->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
});

// Admin-specific routes (adminMiddleware ensures only admins access these)
Route::middleware(['auth', 'adminMiddleware'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');

    // Room Controller route for camp list
    Route::get('/admin/camplist', [RoomController::class, 'index'])->name('admin.camplist');
    //Route::delete('/admin/{camplist}', [RoomController::class, 'destroy'])->name('admin.destroy');

    // Report routes
    Route::get('/admin/reports', [ReportController::class, 'index'])->name('admin.reports');

    // Person routes
    Route::get('/admin/person', [PersonController::class, 'index'])->name('admin.person');

    // Check-In routes
    //Route::get('/admin/checkin', [PersonController::class, 'checkIn'])->name('admin.checkin');
    Route::get('admin/checkin' , [CheckInController::class, 'checkIn'])->name('admin.checkin');       //tambahan
    Route::post('/admin/checkin/store', [CheckInController::class, 'store'])->name( 'admin.checkin.store');

    // Person management (edit, delete and store routes)
    Route::put('/person/{person}', [PersonController::class, 'update'])->name('person.update');  
    Route::delete('/person/{person}', [PersonController::class, 'destroy'])->name('person.destroy');
    Route::post('/person/store', [PersonController::class, 'store'])->name('person.store');

});
