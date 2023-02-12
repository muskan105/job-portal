<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('applicant/detail', [ApplicantController::class, 'addDetails'])->name('applicant.detail.add');
Route::post('applicant/detail/store', [ApplicantController::class, 'storeDetails'])->name('applicant.detail.store');

Route::middleware(['applicant', 'auth'])->group(function () {
    Route::get('/dashboard', [ApplicantController::class, 'dashboard'])->name('dashboard');


    Route::post('applicant/job/apply/{id}', [ApplicantController::class, 'applyJob'])->name('applicant.job.apply');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');

    Route::get('/admin/jobs/add', [AdminController::class, 'showAdd'])->name('admin.job.add');
    Route::post('/admin/jobs/store', [AdminController::class, 'storeJob'])->name('admin.job.store');


    Route::get('/admin/jobs/edit/{id}', [AdminController::class, 'editJob'])->name('admin.job.edit');
    Route::post('/admin/jobs/update/{id}', [AdminController::class, 'updateJob'])->name('admin.job.update');

    Route::post('/admin/jobs/delete/{id}', [AdminController::class, 'deleteJob'])->name('admin.job.delete');
});

Route::get('/admin/login', [AdminController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/dologin', [AdminController::class, 'doLogin'])->name('admin.doLogin');



require __DIR__ . '/auth.php';
