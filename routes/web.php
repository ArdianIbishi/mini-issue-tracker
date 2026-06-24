<?php
use App\Http\Controllers\IssueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\IssueCommentController;
use App\Http\Controllers\IssueTagController;
// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/projects');
Route::resource('projects', ProjectController::class);

Route::resource('issues', IssueController::class);
Route::resource('tags', TagController::class)
    ->only(['index', 'store']);

Route::post('/issues/{issue}/comments',[IssueCommentController::class, 'store'])->name('issues.comments.store');  
Route::delete('/comments/{comment}',[IssueCommentController::class, 'destroy'])->name('comments.destroy');  

Route::post('/issues/{issue}/tags',[IssueTagController::class, 'store'])->name('issues.tags.store');
Route::delete('/issues/{issue}/tags/{tag}',[IssueTagController::class, 'destroy'])->name('issues.tags.destroy');
