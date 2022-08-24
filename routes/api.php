<?php

use App\Http\Controllers\CrudController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});



Route::post("login", [UserController::class, 'login']);

  Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's

    Route::post("logout", [UserController::class, 'logout']);
    Route::get("data/{id?}", [CrudController::class, 'showDataApi']);
    Route::post("add-data", [CrudController::class, 'addDataApi']);
    Route::put("update-data", [CrudController::class, 'updateDataApi']);
    Route::delete("delete-data/{id}", [CrudController::class, 'deleteDataApi']);

    //for search daata(string or anything)
    Route::get("search-data/{name}", [CrudController::class, 'searchDataApi']);
  });
