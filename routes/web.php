<?php

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

Route::get('/', 'WelcomeController@index');
Route::get('/support', 'WelcomeController@support');
Route::get('/about', 'WelcomeController@about');
Route::get('/blog', 'WelcomeController@blog');
Route::get('/contact', 'WelcomeController@contact');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/category/add-category', 'CategoryController@showCategoryForm');
Route::post('/category/new-category', 'CategoryController@saveCategoryInfo');
Route::get('/category/manage-category', 'CategoryController@manageCategoryInfo');
Route::get('/category/unpublished-category/{id}', 'CategoryController@unpublishedCategoryInfo');
Route::get('/category/published-category/{id}', 'CategoryController@publishedCategoryInfo');
Route::get('/category/edit-category/{id}', 'CategoryController@editCategoryInfo');
Route::post('/category/update-category', 'CategoryController@updateCategoryInfo');
Route::get('/category/delete-category/{id}', 'CategoryController@deleteCategoryInfo');

Route::get('/blog/add-blog', 'BlogController@showBlogForm');
Route::post('/blog/new-blog', 'BlogController@saveBlogInfo');
Route::get('/blog/manage-blog', 'BlogController@manageBlogInfo');
Route::get('/blog/view-blog-details/{id}', 'BlogController@viewBlogDetailsInfo');
Route::get('/blog/unpublished-blog/{id}', 'BlogController@unpublishedBlogInfo');
Route::get('/blog/published-blog/{id}', 'BlogController@publishedBlogInfo');
Route::get('/blog/edit-blog/{id}', 'BlogController@editBlogInfo');
Route::post('/blog/update-blog', 'BlogController@updateBlogInfo');
Route::get('/blog/delete-blog/{id}', 'BlogController@deleteBlogInfo');