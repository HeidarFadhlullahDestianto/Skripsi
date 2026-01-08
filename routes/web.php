<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminLatihanController;
use App\Http\Controllers\LatihanController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\UserProgramController;
use App\Http\Controllers\DayController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserScheduleController;
use App\Http\Controllers\Admin\ImportController;
use App\Http\Controllers\ExpertController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Http\Controllers\Auth\ForgotPasswordPhoneController;


Route::get('/forgot-password-phone', [ForgotPasswordPhoneController::class, 'showPhoneForm'])
    ->name('password.phone');

Route::post('/forgot-password-phone', [ForgotPasswordPhoneController::class, 'sendCode'])
    ->name('password.phone.send');

Route::get('/verify-code', [ForgotPasswordPhoneController::class, 'showVerifyForm'])
    ->name('password.verify');

Route::post('/verify-code', [ForgotPasswordPhoneController::class, 'verifyCode'])
    ->name('password.verify.submit');

Route::get('/reset-password-phone', [ForgotPasswordPhoneController::class, 'showResetForm'])
    ->name('password.reset.phone');

Route::post('/reset-password-phone', [ForgotPasswordPhoneController::class, 'resetPassword'])
    ->name('password.reset.phone.submit');




Route::get('/', [HomeController::class, 'index'])->name('home');
//login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    // DASHBOARD
    Route::get('/admin/dashboard', [DashboardController::class, 'dashboardAdmin'])
        ->name('admin.dashboard');

    Route::get('/user/dashboard', [DashboardController::class, 'dashboardUser'])
        ->name('user.dashboard');

    // ---------------- ADMIN - NEWS CRUD ----------------
    Route::get('/newsaja', [NewsController::class, 'index'])->name('news.index');
    Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');
    
    // ===========================
    // ADMIN ROUTE — PREFIX ADMIN
    // ===========================
    Route::prefix('admin')->middleware(['auth'])->group(function () {
        Route::get('/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
        Route::get('/news/create', [NewsController::class, 'create'])->name('admin.news.create');
        Route::post('/news', [NewsController::class, 'store'])->name('admin.news.store');
        Route::delete('/news/{news}', [NewsController::class, 'destroy'])
        ->name('admin.news.destroy');
         // ✅ EDIT
    Route::get('/news/{news}/edit', [NewsController::class, 'edit'])
    ->name('admin.news.edit');

// ✅ UPDATE
Route::put('/news/{news}', [NewsController::class, 'update'])
    ->name('admin.news.update');
    });

    // ---------------- ADMIN - LATIHAN CRUD ----------------
    Route::prefix('admin/latihan')->group(function () {
        Route::get('/', [AdminLatihanController::class, 'index'])->name('admin.latihan.index');
        Route::get('/create', [AdminLatihanController::class, 'create'])->name('admin.latihan.create');
        Route::post('/store', [AdminLatihanController::class, 'store'])->name('admin.latihan.store');
        Route::get('/edit/{id}', [AdminLatihanController::class, 'edit'])->name('admin.latihan.edit');
        Route::put('/update/{id}', [AdminLatihanController::class, 'update'])->name('admin.latihan.update');
        Route::delete('/delete/{id}', [AdminLatihanController::class, 'destroy'])->name('admin.latihan.delete');
    });

    // USER melihat daftar latihan
    Route::get('/latihan', [LatihanController::class, 'index'])
        ->name('user.latihan.index');

    Route::get('/latihan/{id}', [LatihanController::class, 'show'])
        ->name('user.latihan.show');



    /*  
    |==============================
    | ADMIN - PROGRAM CRUD (NEW)
    |==============================
    */
    Route::prefix('admin/program')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('admin.program.index');
        Route::get('/create', [ProgramController::class, 'create'])->name('admin.program.create');
        Route::post('/store', [ProgramController::class, 'store'])->name('admin.program.store');
        Route::get('/edit/{id}', [ProgramController::class, 'edit'])->name('admin.program.edit');
        Route::put('/update/{id}', [ProgramController::class, 'update'])->name('admin.program.update');
        Route::delete('/delete/{id}', [ProgramController::class, 'destroy'])->name('admin.program.delete');
    });


    /*
    |==============================
    | ADMIN - DAY CRUD (NEW)
    |==============================
    */
   // ==== ROUTE UNTUK DAY BERDASARKAN PROGRAM ==== //
Route::prefix('admin/program/{program_id}/day')->group(function () {

    // tampil semua day dalam 1 program
    Route::get('/', [DayController::class, 'index'])->name('admin.day.index');

    // form tambah day
    Route::get('/create', [DayController::class, 'create'])->name('admin.day.create');

    // simpan day
    Route::post('/store', [DayController::class, 'store'])->name('admin.day.store');
    
    

});
Route::delete('/admin/day/{id}', [DayController::class, 'destroy'])
    ->name('admin.day.destroy');

// ==== ROUTE YANG BERDASARKAN DAY ID (edit, update, delete) ==== //
// Day Management
Route::get('/admin/program/{id}/days', [DayController::class, 'index'])->name('admin.day.index');
Route::get('/admin/program/{id}/days/create', [DayController::class, 'create'])->name('admin.day.create');
Route::post('/admin/program/{id}/days', [DayController::class, 'store'])->name('admin.day.store');



Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/import', [ImportController::class, 'index'])->name('import.index');
    Route::post('/import', [ImportController::class, 'store'])->name('import.store');
});



    /*
    |==============================
    | ADMIN - EXERCISE CRUD (NEW)
    |==============================
    */
   // List latihan per hari
Route::get('/day/{day_id}/exercise', [ExerciseController::class, 'index'])
->name('admin.exercise.index');

// Form tambah latihan
Route::get('/day/{day_id}/exercise/create', [ExerciseController::class, 'create'])
->name('admin.exercise.create');

// Simpan latihan baru
Route::post('/day/{day_id}/exercise', [ExerciseController::class, 'store'])
->name('admin.exercise.store');

// Form edit latihan
Route::get('/exercise/{id}/edit', [ExerciseController::class, 'edit'])
->name('admin.exercise.edit');

// Update latihan
Route::put('/exercise/{id}', [ExerciseController::class, 'update'])
->name('admin.exercise.update');

// Hapus latihan
Route::delete('/exercise/{id}', [ExerciseController::class, 'destroy'])
->name('admin.exercise.delete');



    /*
    |==============================
    | USER PAGE (Program - Day - Exercise)
    |==============================
    */
    Route::get('/program', [UserProgramController::class, 'index'])->name('program.index');
    Route::get('/program/{id}', [UserProgramController::class, 'show'])->name('program.show');
    Route::get('/program/day/{id}', [UserProgramController::class, 'day'])->name('program.days');

    // USER melihat latihan per hari
Route::get('/program/{program_id}/day/{day_id}', [UserProgramController::class, 'dayDetail'])
->name('user.day.detail');
Route::get('/program/{id}/days', [UserProgramController::class, 'days'])
    ->name('user.program.days');
  
   

    Route::prefix('jadwal-latihan')->middleware('auth')->group(function () {

        Route::get('/', [UserScheduleController::class, 'create'])
            ->name('user.jadwal.create');
    
        Route::post('/', [UserScheduleController::class, 'store'])
            ->name('user.jadwal.store');
    
        Route::get('/list', [UserScheduleController::class, 'index'])
            ->name('user.jadwal.index');
    
        Route::get('/day/{day}', [UserScheduleController::class, 'show'])
            ->name('user.jadwal.show');
        Route::get('/edit/{schedule}', [UserScheduleController::class, 'edit'])
            ->name('user.jadwal.edit');
    
        Route::put('/edit/{schedule}', [UserScheduleController::class, 'update'])
            ->name('user.jadwal.update');
        Route::delete('/{id}', [UserScheduleController::class, 'destroy'])
            ->name('user.jadwal.destroy');
    });
    
   

    
    Route::get('/expert', [ExpertController::class, 'index'])->name('expert.index');
    Route::post('/expert/recommend', [ExpertController::class, 'recommend'])->name('expert.recommend');
    Route::get('/expert/detail/{id}', [ExpertController::class, 'detail'])->name('expert.detail');
// Simpan jadwal
Route::post('/expert/save/{id}', [ExpertController::class, 'save'])->name('expert.save');

Route::get('/expert/saved', [ExpertController::class, 'saved'])->name('expert.saved');

Route::delete('/expert/saved/{id}', [ExpertController::class, 'destroy'])
        ->name('expert.saved.delete');

});
 // END MIDDLEWARE AUTH


// ==========================================
// PUBLIC NEWS (TIDAK PERLU LOGIN)
// ==========================================



Route::resource('sliders', SliderController::class);





Route::get('/jadwalkan', function () {
    return view('jadwalkan');
})->name('jadwalkan');



Route::get('/program/massaotot', function () {
    return view('program.massaotot');
})->name('program.massaotot');

Route::get('/program/{program_id}/days', [UserProgramController::class, 'days'])
     ->name('user.program.days');
