<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DolgozoController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get("/home", [DolgozoController::class, "index"]);
Route::get("/create", [DolgozoController::class, "create"]);
Route::post("/store", [DolgozoController::class, "store"]);
Route::get("/select/{id}", [DolgozoController::class, "show"]);
Route::get("/delete/{id}", [ DolgozoController::class, "deleteDolgozo" ]);
Route::get("/update/{id}", [DolgozoController::class, "showUpdateDolgozo"]);
Route::post("/update-dolgozo", [ DolgozoController::class, "submitUpdateDolgozo" ]);
