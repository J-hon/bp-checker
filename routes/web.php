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
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::get('login', function () {
        return view('login');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('patient', function () {
        return view('create-patient');
    })->name('patient.create');

    Route::get('{patient_id}/blood-pressure-reading', function ($patient_id) {
        return view('create-blood-pressure-reading', ['patient_id' => $patient_id]);
    })->name('blood-pressure-reading.create');

    Route::get('logout', 'AuthController@logout')->name('logout');
});
