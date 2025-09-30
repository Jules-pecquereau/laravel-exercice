<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\UniversController;

Route::resource('Univers', UniversController::class);
Route::get("/", [UniversController::class,'index'])->name('/');
Route::get("/AjouterForm", [UniversController::class,'AjouterForm'])->name('Ajouter.form');
Route::post("/AjouterForm",[UniversController::class,'store'])->name('Ajouter.store');
