<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TeacherController;
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

Route::get('/', [PageController::class, 'showHome'])->name('home');

require __DIR__.'/auth.php';


Route::group(['prefix' => 'docent', 'middleware' => ['auth', 'teacher']], function () {
    Route::get('/', [TeacherController::class, 'showDashboard'])->name('teacher_dashboard');
    Route::get('/klas/{classCode}', [TeacherController::class, 'showClass'])->name('teacher_class');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'showDashboard'])->name('admin_dashboard');
    Route::get('/admins', [AdminController::class, 'manageAdmins'])->name('admin_manage_admins');
    Route::post('/admins/{userId}/toggle', [AdminController::class, 'toggleAdmin'])->name('admin_toggle_admin');
    Route::get('/docenten', [AdminController::class, 'manageTeachers'])->name('admin_manage_teachers');
    Route::get('/klassen', [AdminController::class, 'manageClasses'])->name('admin_manage_classes');
    Route::get('/klassen/{classCode}', [AdminController::class, 'manageStudents'])->name('admin_manage_students');
    Route::get('/student/{studentId}/beheren', [AdminController::class, 'manageStudent'])->name('admin_manage_student');
    Route::post('/student/{studentId}/beheren', [AdminController::class, 'processManageStudent'])->name('admin_process_manage_student');
    Route::post('/student/{studentId}/toggle-active', [AdminController::class, 'toggleStudentActive'])->name('admin_toggle_student_active');
    Route::get('/leraar/{teacherId}/beheren', [AdminController::class, 'manageTeacher'])->name('admin_manage_teacher');
    Route::post('/leraar/{teacherId}/toggle-active', [AdminController::class, 'toggleTeacherActive'])->name('admin_toggle_teacher_active');
    Route::post('/leraar/{teacherId}/toggle-class/{classId}', [AdminController::class, 'toggleTeacherClass'])->name('admin_toggle_teacher_class');
});

Route::group(['prefix' => '{studentSlug}/beheren', 'middleware' => ['auth', 'student']], function () {
    Route::get('/voorstellen', [ManageController::class, 'manageIntroduction'])->name('manage_introduction');
    Route::post('/voorstellen', [ManageController::class, 'processManageIntroduction'])->name('process_manage_introduction');
    Route::get('/kwaliteiten', [ManageController::class, 'manageQualities'])->name('manage_qualities');
    Route::post('/kwaliteiten', [ManageController::class, 'processManageQualities'])->name('process_manage_qualities');
    Route::get('/motieven', [ManageController::class, 'manageMotives'])->name('manage_motives');
    Route::post('/motieven', [ManageController::class, 'processManageMotives'])->name('process_manage_motives');
    Route::get('/werkexploratie', [ManageController::class, 'manageExploration'])->name('manage_exploration');
    Route::post('/werkexploratie', [ManageController::class, 'processManageExploration'])->name('process_manage_exploration');
    Route::get('/loopbaansturing', [ManageController::class, 'manageExperience'])->name('manage_experience');
    Route::post('/loopbaansturing', [ManageController::class, 'processManageExperience'])->name('process_manage_experience');
    Route::get('/netwerken', [ManageController::class, 'manageNetworks'])->name('manage_networks');
    Route::post('/netwerken', [ManageController::class, 'processManageNetworks'])->name('process_manage_networks');
});

Route::group(['prefix' => '{studentSlug}', 'middleware' => ['active']], function () {
    Route::get('/', [PageController::class, 'showMain'])->name('main');
    Route::get('/voorstellen', [PageController::class, 'showIntroduction'])->name('introduction');
    Route::get('/kwaliteiten', [PageController::class, 'showQualities'])->name('qualities');
    Route::get('/motieven', [PageController::class, 'showMotives'])->name('motives');
    Route::get('/werkexploratie', [PageController::class, 'showExploration'])->name('exploration');
    Route::get('/loopbaansturing', [PageController::class, 'showExperience'])->name('experience');
    Route::get('/netwerken', [PageController::class, 'showNetworks'])->name('networks');
});






