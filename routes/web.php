<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});