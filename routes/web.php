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

Route::get('/', 'BlogController@index')->name('blog');

Route::get('/blog/{post}', 'BlogController@show')->name('blog.show');

Route::get('/category/{category}', 'BlogController@category')->name('category');

Route::get('/author/{author}', 'BlogController@author')->name('author');

Auth::routes();

Route::get('/home', 'Backend\HomeController@index')->name('home');

// Route::resource('/backend/blog', 'Backend\Blog2Controller');

Route::group(['middleware' => ['auth']], function(){
  Route::get('/backend/blog', 'Backend\BlogController@index')
        ->name('backend.blog.index');
  Route::match(['get', 'post'],'/backend/blog/create', 'Backend\BlogController@create')
        ->name('backend.blog.create');
  Route::match(['get', 'post'],'/backend/blog/store', 'Backend\BlogController@store')
        ->name('backend.blog.store');
  Route::match(['get', 'post'],'/backend/blog/edit/{id}', 'Backend\BlogController@edit')
        ->name('backend.blog.edit');
  Route::match(['get', 'post'],'/backend/blog/destroy/{id}', 'Backend\BlogController@destroy')
        ->name('backend.blog.destroy');
});
