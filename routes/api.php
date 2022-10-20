<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirmenController;
use App\Http\Controllers\MitarbeiterController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get("/firmen",[FirmenController::class, "index"]);
Route::get("/admin",[AdminController::class, "index"]);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/firmen/{id}",[FirmenController::class, "show"]);
Route::get("/mitarbeiter/{firmen_id}",[MitarbeiterController::class, "index"]);

Route::post("/register",[AdminController::class, "add"]);

Route::get("/mitarbeiter",[MitarbeiterController::class, "show"]);
Route::post("/mitarbeiter",[MitarbeiterController::class, "store"]);