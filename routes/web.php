<?php

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

Route::get('/', function () {
    return view('layout');
});

Route::resource('/posts',PostController::class);
Route::post('/get_posts_list', 'PostController@getPostsList');

Route::resource('/authors',AuthorController::class);
Route::post('/get_authors_list', 'AuthorController@getAuthorsList');
Route::get('/view_author_posts/{id}', 'AuthorController@viewAuthorPosts');

Route::resource('/categories',CategoryController::class);
Route::post('/get_categories_list', 'CategoryController@getCategoriesList');
Route::get('/view_category_posts/{id}', 'CategoryController@viewCategoryPosts');