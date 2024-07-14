<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.list');
Route::get('/issues', [IssueController::class, 'index'])->name('issues.list');
Route::get('/issues/create', [IssueController::class, 'create'])->name('issues.create');
Route::post('/issues', [IssueController::class, 'store'])->name('issues.store');
Route::delete('/issues/{id}', [IssueController::class, 'delete'])->name('issues.delete');
