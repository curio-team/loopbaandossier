<?php

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

Route::get('/voorstellen', [PageController::class, 'showIntroduction'])->name('introduction');

Route::get('/kwaliteiten', [PageController::class, 'showQualities'])->name('qualities');

Route::get('/motieven', [PageController::class, 'showMotives'])->name('motives');

Route::get('/werkexploratie', [PageController::class, 'showExploration'])->name('exploration');

Route::get('/loopbaansturing', [PageController::class, 'showExperience'])->name('experience');

Route::get('/netwerken', [PageController::class, 'showNetworks'])->name('networks');

require __DIR__.'/auth.php';
