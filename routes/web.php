<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/student', [StudentController::class, 'index']);

Route::post('/student/create', [StudentController::class, 'store'])->name('student');

Route::get('/student/show', [StudentController::class, 'showStudents']);

Route::get('/teacher', [TeacherController::class, 'index']);

Route::post('/teacher/create', [TeacherController::class, 'store'])->name('teacher');

Route::get('/class', [ClassController::class, 'index']);

Route::post('/class/create', [ClassController::class, 'store'])->name('team');

Route::get('/class/show', [ClassController::class, 'showTeams']);

Route::get('/team/{teamId}', [ClassController::class, 'viewTeam'])->name('team.view');

Route::post('/team/{teamId}/students', [ClassController::class, 'addStudent'])->name('team.students.add');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
