<?php

use App\Http\Controllers\VacanciesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('vacancies', controller: VacanciesController::class);
