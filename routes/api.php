
<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
// use with or without length. Length can be 5, 6, 7
// Example /api/words/6
Route::get('/words/{length?}', 'API\WordAPIController@words');
Route::get('/randomWord/{length?}', 'API\WordAPIController@randomWord');
