<?php

use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LeagueController;

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

// Route::get("/",[PostController::class,'index']);
Route::get("/insert-data",[PostController::class,'create']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('league')->group(function () {
    Route::get("/",[LeagueController::class,'index']);
    Route::get("/create",[LeagueController::class,'create'])->name('add-league');
    Route::post("/create",[LeagueController::class,'store'])->name('create-league');
    Route::get("/edit/{id}",[LeagueController::class,'edit'])->name('edit-league');
    Route::post("/update",[LeagueController::class,'update'])->name('update-league');
    Route::get("/delete/{id}",[LeagueController::class,'destroy'])->name('delete-league');
});

Route::prefix('result')->group(function () {
    Route::get("/",[HasilController::class,'index']);
    Route::get("/create",[HasilController::class,'create'])->name('hasil.create');
    Route::post("/create",[HasilController::class,'store'])->name('hasil.add');
    Route::get("/edit/{id}",[HasilController::class,'edit'])->name('hasil.edit');
    Route::post("/update",[HasilController::class,'update'])->name('hasil.update');
    Route::get("/delete/{id}",[HasilController::class,'destroy'])->name('hasil.delete');
});
