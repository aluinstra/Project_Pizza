<?php

use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\PizzaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/ingredients', [IngredientsController::class, 'index'])->name('ingredients.index');
Route::get('/ingredients/create', [IngredientsController::class, 'create'])->name('ingredients.create');
Route::post('/ingredients', [IngredientsController::class, 'store'])->name('ingredients.store');
Route::get('/ingredients/{ingredient}/edit', [IngredientsController::class, 'edit'])->name('ingredients.edit');
Route::put('/ingredients/{ingredient}', [IngredientsController::class, 'update'])->name('ingredients.update');
Route::delete('/ingredients/{ingredient}', [IngredientsController::class, 'delete'])->name('ingredients.destroy');

Route::get('/pizzas', [PizzaController::class, 'index'])->name('pizzas.index');
Route::get('/pizzas/create', [PizzaController::class, 'create'])->name('pizzas.create');
Route::post('/pizzas', [PizzaController::class, 'store'])->name('pizzas.store');
Route::get('/pizzas/{pizza}/edit', [PizzaController::class, 'edit'])->name('pizzas.edit');
Route::put('/pizzas/{pizza}', [PizzaController::class, 'update'])->name('pizzas.update');
Route::delete('/pizzas/{pizza}', [PizzaController::class, 'delete'])->name('pizzas.destroy');

Route::get('/categories/{category}/ingredients', [CategoryIngredientController::class, 'index'])->name('category.ingredients.index');



Route::get('/', function () {
    return view('welcome');
});
