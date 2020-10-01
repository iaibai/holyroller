<?php

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

Route::get('/', function () {
    $previousRolls = \App\HolyRoll::all();

    $roll = new \App\HolyRoll();
    $roll->roll = rand(0, 100000);
    $roll->save();

    return view('welcome', compact('roll', 'previousRolls'));
});
