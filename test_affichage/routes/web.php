<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcceuilController;
use App\Http\Controllers\TestController;

Route::get('multiplier/{a}/{b?}', function( int $a, int $b = 1){
    return " je suis sur la page ".$a*$b;
});
Route::get("/", [AcceuilController::class,'acceuil']);
Route::get("/about/{message?}", [AcceuilController::class,'about']);
Route::resource('TestController', TestController::class);
