<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\LojaController;



Route::get('/', function () {
    return view('welcome');
});


Route::resource('lojas', LojaController::class);
