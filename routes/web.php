<?php
use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/projects');
Route::resource('projects', ProjectController::class);

Route::resource('issues', IssueController::class);
Route::resource('tags', TagController::class)
    ->only(['index', 'store']);