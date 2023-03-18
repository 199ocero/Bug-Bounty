<?php

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::resource('program', ProgramController::class);
    Route::get('program/{program_id}/user', [ProgramController::class, 'showByUser']);
    Route::get('program/user/all', [ProgramController::class, 'showAllByUser']);

    Route::resource('report', ReportController::class);
    Route::get('report/{report_id}/user', [ReportController::class, 'showByUser']);
    Route::get('report/user/all', [ReportController::class, 'showAllByUser']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);