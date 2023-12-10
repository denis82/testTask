<?php

use App\Exports\ResultsExport;
use Illuminate\Support\Facades\Route;
use App\Layers\Presentation\Controllers\Race\GetParticipantsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [GetParticipantsController::class, 'get'])->name('welcome');
Route::get('/export', [GetParticipantsController::class, 'export'])->name('export');
