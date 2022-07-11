<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalTypes;
use App\Http\Controllers\Api\Animal;

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

Route::get('animal_types', [AnimalTypes::class, 'getAll']);
Route::get('animal', [Animal::class, 'getAll']);
Route::post('animal', [Animal::class, 'create']);
Route::post('animal/make_older', [Animal::class, 'makeOlder']);
Route::post('animal/delete', [Animal::class, 'deleteAnimalByName']);
