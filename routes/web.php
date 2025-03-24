<?php

use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CountryContentController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminUserController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminUserController::class, 'login']);
    Route::post('/logout', [AdminUserController::class, 'logout'])->name('logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/home', function () {
            return view('admin.home');
        })->name('home');

        // ✅ Fix: Add 'name' prefix for resource routes
        Route::get('/country-content', [CountryContentController::class, 'index'])->name('country_content.index'); // List content
        Route::get('/country-content/create', [CountryContentController::class, 'create'])->name('country_content.create'); // Show create form
        Route::post('/country-content', [CountryContentController::class, 'store'])->name('country_content.store'); // Store content
        Route::get('/country-content/{id}/edit', [CountryContentController::class, 'edit'])->name('country_content.edit'); // Show edit form
        Route::put('/country-content/{id}', [CountryContentController::class, 'update'])->name('country_content.update'); // Update content
        Route::delete('/country-content/{id}', [CountryContentController::class, 'destroy'])->name('country_content.destroy'); // Delete content
        Route::resource('country_content', CountryContentController::class)->names('country_content');
    });
});

// Intro page route
Route::get('/', function () {
    return view('intro');
})->name('intro');

// Home page route
Route::get('/home', function () {
    return view('home');
})->name('home');

// Dynamic country view routes
Route::get('/{countrySlug}', function ($countrySlug) {
    $country = \App\Models\Country::where('slug', $countrySlug)->firstOrFail();
    $contents = \App\Models\CountryContent::where('country_id', $country->id)->get();

    // Dynamically load the country-specific view
    return view($countrySlug, compact('contents')); // Ex: myanmar.blade.php
})->name('country.view');
