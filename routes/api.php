<?php
use App\Http\Controllers\RegController;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\UserController;
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



//Route::post("/register", [UserController::class, 'register']);
//Route::post('/register', 'App\Http\Controllers\UserController@register');
//Route::post('/nana', [UserController::class, 'register']);
//Route::post('/nana', 'App\Http\Controllers\RegController@register');

//Route::post('register', 'API\RegController@register');

Route::post('/register', [RegController::class, 'register']);