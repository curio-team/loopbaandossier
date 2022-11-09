<?php

use App\Http\Controllers\AdminController;
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

Route::get('/admin', [AdminController::class, 'showAdmin'])->name('admin');

Route::get('/{studentSlug}', [PageController::class, 'showMain'])->name('main');
Route::get('/{studentSlug}/voorstellen', [PageController::class, 'showIntroduction'])->name('introduction');
Route::get('/{studentSlug}/kwaliteiten', [PageController::class, 'showQualities'])->name('qualities');
Route::get('/{studentSlug}/motieven', [PageController::class, 'showMotives'])->name('motives');
Route::get('/{studentSlug}/werkexploratie', [PageController::class, 'showExploration'])->name('exploration');
Route::get('/{studentSlug}/loopbaansturing', [PageController::class, 'showExperience'])->name('experience');
Route::get('/{studentSlug}/netwerken', [PageController::class, 'showNetworks'])->name('networks');


