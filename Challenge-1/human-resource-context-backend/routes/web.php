<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;


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

// Default route to the welcome view
Route::get('/', function () {
    return view('welcome');
});

// Route for retrieving attendance information
Route::get('/attendance', [AttendanceController::class, 'getAttendance'])->name('attendance');

// Route for uploading attendance
Route::post('attendance/upload', [AttendanceController::class, 'upload'])->name('attendance.upload');
