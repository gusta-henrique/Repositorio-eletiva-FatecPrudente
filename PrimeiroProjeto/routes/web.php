<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/exercicio', function() {
    return view('exercicio');
});

Route::post('/resposta', function(Request $request){
    $valor1 = $request->input('valor1');
    $valor2 = $request->input('valor2');
    $soma =  $valor1 + $valor2;
    return("a soma é: $soma");
});