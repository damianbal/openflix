<?php

use Illuminate\Http\Request;

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

/*
|--------------------------------------------------------------------------
| Auth
|--------------------------------------------------------------------------
 */

Route::post('/sign-in', 'AuthController@signIn');
Route::post('/sign-up', 'AuthController@signUp');
Route::post('/sign-out', 'AuthController@signOut');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*
|--------------------------------------------------------------------------
| Movies
|--------------------------------------------------------------------------
 */
Route::get('/movies', 'MovieController@index')->name('movies.index');
Route::get('/movie/{id}', 'MovieController@show')->name('movies.show');
Route::post('/movie/{movie}/like', 'MovieController@like')->middleware('auth:api');
Route::post('/movie/{movie}/unlike', 'MovieController@unlike')->middleware('auth:api');
Route::get('/movies/popular', 'MovieController@popular');

/*
|--------------------------------------------------------------------------
| Genres
|--------------------------------------------------------------------------
 */
Route::get('/genres', 'GenreController@index')->name('genres.index');
Route::get('/genres/{genre}', 'GenreController@show')->name('genres.show');

/*
|--------------------------------------------------------------------------
| User
|--------------------------------------------------------------------------
 */
Route::get('/user/likes', 'UserController@liked')->middleware('auth:api');
