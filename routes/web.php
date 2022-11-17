<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\PageController;
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


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', [AdminController::class, 'showAdmin'])->name('admin');
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

Route::group(['prefix' => '{studentSlug}'], function () {
    Route::get('/', [PageController::class, 'showMain'])->name('main');
    Route::get('/voorstellen', [PageController::class, 'showIntroduction'])->name('introduction');
    Route::get('/kwaliteiten', [PageController::class, 'showQualities'])->name('qualities');
    Route::get('/motieven', [PageController::class, 'showMotives'])->name('motives');
    Route::get('/werkexploratie', [PageController::class, 'showExploration'])->name('exploration');
    Route::get('/loopbaansturing', [PageController::class, 'showExperience'])->name('experience');
    Route::get('/netwerken', [PageController::class, 'showNetworks'])->name('networks');
});






