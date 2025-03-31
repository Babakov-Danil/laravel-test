<?php

use App\Http\Controllers\VacanciesController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("index");
});
Route::get("/migrate", function () {
    Artisan::call('migrate --seed');
    return Artisan::output();
});
Route::resource('vacancies', VacanciesController::class);
