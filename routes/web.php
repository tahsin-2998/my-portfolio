<?php

use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PortfolioController::class, 'index'])->name('home');
Route::get('/projects', [PortfolioController::class, 'projects'])->name('project');
Route::post('/contact', [PortfolioController::class, 'contact'])
    ->middleware('throttle:5,1')
    ->name('contact');
