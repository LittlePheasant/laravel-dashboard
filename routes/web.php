<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ActualReportController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DownloadController;

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

// Route::get('/', function() {
//     return view('report.index');
// });
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login/process', [AuthController::class, 'loginAction'])->name('loginAction');

Route::get('/', [DashboardController::class, 'index']) -> name('dashboard');

// Grouped under the /dashboard prefix
Route::prefix('dashboard')->group(function () {

    Route::get('/accomplishment-reports', [ReportController::class, 'accomplishments_reports'])->name('acc-report');
    Route::get('/accomplishment-reports/{id}', [ReportController::class, 'show'])->name('report-byId');

    Route::get('/actual-accomplishment-reports', [ActualReportController::class, 'actual_reports'])->name('actual-reports');

    Route::get('/user-list', [UserController::class, 'user_list'])->name('user-list');
    Route::get('/users-paginated', [UserController::class, 'getPaginatedUsers'])->name('users-paginated');
    Route::get('/user-list/{id}', [UserController::class, 'userInfoByID'])->name('userInfoByID');

    Route::get('/program-list', [ProgramController::class, 'program_list'])->name('program-list');
    Route::get('/program-list/{id}', [ProgramController::class, 'programInfoByID'])->name('programInfoByID');

    Route::get('/downloads-list', [DownloadController::class, 'downloads_list'])->name('downloads-list');
    Route::get('/downloads-list/{id}', [DownloadController::class, 'downloadInfoByID'])->name('downloadInfoByID');
});