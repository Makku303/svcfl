<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiagnosticsController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\PatientSearchController;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/express-diagnostics', function () {
    return view('express-diagnostics');
})->name('express-diagnostics');
 
Route::get('/lab-results', function () {
    return view('/client-pages/lab-results');
})->name('lab-results');

Route::get('/ua-results', function () {
    return view('ua-results');
})->name('ua-results');

Route::get('/occult-results', function () {
    return view('occult-results');
})->name('occult-results');

Route::get('/ua-hgb-results', function () {
    return view('ua-hgb-results');
})->name('ua-hgb-results');

Route::get('/cholinesterase-results', function () {
    return view('cholinesterase-results');
})->name('cholinesterase-results');

Route::get('/hgb-results', function () {
    return view('hgb-results');
})->name('hgb-results');

Route::get('/cbc-results', function () {
    return view('cbc-results');
})->name('cbc-results');

Route::get('/hepaA-results', function () {
    return view('hepaA-results');
})->name('hepaA-results');

Route::get('/hepaB-Quantitative-results', function () {
    return view('hepaB-Quantitative-results');
})->name('hepaB-Quantitative-results');

Route::get('/hepaB-Qualitative-results', function () {
    return view('hepaB-Qualitative-results');
})->name('hepaB-Qualitative-results');

Route::get('/pt-serum-results', function () {
    return view('pt-serum-results');
})->name('pt-serum-results');

Route::get('/pt-urine-results', function () {
    return view('pt-urine-results');
})->name('pt-urine-results');

Route::get('/syphilis-results', function () {
    return view('syphilis-results');
})->name('syphilis-results');

Route::get('/raptest-results', function () {
    return view('raptest-results');
})->name('raptest-results');

Route::get('/hiv-results', function () {
    return view('hiv-results');
})->name('hiv-results');

Route::get('/bloodtype-results', function () {
    return view('bloodtype-results');
})->name('bloodtype-results');

Route::get('/thyroid-results', function () {
    return view('thyroid-results');
})->name('thyroid-results');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users', function () {
    return view('/admin-pages/users');
})->middleware(['auth', 'verified'])->name('users');

Route::middleware('auth')->group(function () {
    Route::get('/users', [UserController::class, 'index'])->name('user.list');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::patch('/users', [UserController::class, 'update'])->name('user.update');
    Route::delete('/users', [UserController::class, 'destroy'])->name('user.destroy');
});

/*       admin diagnostics pages         */
Route::get('/diagnostics/bloodtype', function () {
    return view('/admin-pages/diagnostics/bloodtype');
})->middleware(['auth', 'verified'])->name('diagnostics.bloodtype');

Route::get('/diagnostics/cbc', function () {
    return view('/admin-pages/diagnostics/cbc');
})->middleware(['auth', 'verified'])->name('diagnostics.cbc');

Route::get('/diagnostics/cholines', function () {
    return view('/admin-pages/diagnostics/cholines');
})->middleware(['auth', 'verified'])->name('diagnostics.cholines');

Route::get('/diagnostics/hepa/A', function () {
    return view('/admin-pages/diagnostics/hepa-A');
})->middleware(['auth', 'verified'])->name('diagnostics.hepaA');

Route::get('/diagnostics/hepa/B1', function () {
    return view('/admin-pages/diagnostics/hepa-B1');
})->middleware(['auth', 'verified'])->name('diagnostics.hepaB1');

Route::get('/diagnostics/hepa/B2', function () {
    return view('/admin-pages/diagnostics/hepa-B2');
})->middleware(['auth', 'verified'])->name('diagnostics.hepaB2');

Route::get('/diagnostics/hgb', function () {
    return view('/admin-pages/diagnostics/hgb');
})->middleware(['auth', 'verified'])->name('diagnostics.hgb');

Route::get('/diagnostics/hiv', function () {
    return view('/admin-pages/diagnostics/hiv');
})->middleware(['auth', 'verified'])->name('diagnostics.hiv');

Route::get('/diagnostics/occult', function () {
    return view('/admin-pages/diagnostics/occult');
})->middleware(['auth', 'verified'])->name('diagnostics.occult');

Route::get('/diagnostics/pt/serum', function () {
    return view('/admin-pages/diagnostics/pt-serum');
})->middleware(['auth', 'verified'])->name('diagnostics.ptserum');

Route::get('/diagnostics/pt/urine', function () {
    return view('/admin-pages/diagnostics/pt-urine');
})->middleware(['auth', 'verified'])->name('diagnostics.pturine');

Route::get('/diagnostics/raptest', function () {
    return view('/admin-pages/diagnostics/raptest');
})->middleware(['auth', 'verified'])->name('diagnostics.raptest');

Route::get('/diagnostics/syphilis', function () {
    return view('/admin-pages/diagnostics/syphilis');
})->middleware(['auth', 'verified'])->name('diagnostics.syphilis');

Route::get('/diagnostics/thyroid', function () {
    return view('/admin-pages/diagnostics/thyroid');
})->middleware(['auth', 'verified'])->name('diagnostics.thyroid');

Route::get('/diagnostics/uahgb', function () {
    return view('/admin-pages/diagnostics/uahgb');
})->middleware(['auth', 'verified'])->name('diagnostics.uahgb');


Route::post('/express-diagnostics', [DiagnosticsController::class, 'store'])->name('diagnostics.express');

//Route::post('/diagnostics/search', [PatientSearchController::class, 'store']);
Route::post('/diagnostics/search', [DiagnosticsController::class, 'search']);

Route::post('/admin-pages/diagnostics/bloodtype', [ResultsController::class, 'store'])->name('/admin-pages/diagnostics/bloodtype');


require __DIR__.'/auth.php';
