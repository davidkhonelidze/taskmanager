<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.list');
Route::get('/issues', [IssueController::class, 'index'])->name('issues.list');
