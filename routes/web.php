<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('notes', 'notes.index')
    ->middleware(['auth'])
    ->name('notes.index');

Route::view('notes/add', 'notes.add')
    ->middleware(['auth'])
    ->name('notes.add');

Volt::route('notes/{note}/edit', 'notes.edit')
    ->middleware(['auth'])
    ->name('notes.edit');

require __DIR__.'/auth.php';
