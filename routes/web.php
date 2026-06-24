<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/projects');
Route::resource('projects', ProjectController::class);