<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => ''], function () {
    Route::post('/desafio-um', 'App\Http\Controllers\SolucaoController@lucroMax')->name('desafio.um.submit');
    Route::post('/desafio-dois', 'App\Http\Controllers\SolucaoController@melhorPar')->name('desafio.dois.submit');
});