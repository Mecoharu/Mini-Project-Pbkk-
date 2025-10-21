<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreateRecipe;
use App\Livewire\ShowRecipes;
use App\Livewire\RecipeDetail;
use App\Livewire\EditRecipe;


Route::get('/', ShowRecipes::class)->name('home');

Route::get('/recipe/{recipe}', RecipeDetail::class)->name('recipe.detail');


Route::get('/dashboard', ShowRecipes::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::get('/upload-recipe', CreateRecipe::class)
    ->middleware(['auth', 'verified'])
    ->name('recipe.create');

    Route::get('/recipe/{recipe}/edit', EditRecipe::class)
    ->middleware(['auth', 'verified'])
    ->name('recipe.edit');


