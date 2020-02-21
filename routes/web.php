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

Route::resource('/backend/blog', 'Backend\BlogController',[
	'names' => [
			'index' => 'backend.blog.index',
			'create' => 'backend.blog.create',
      'edit' => 'backend.blog.edit',
      'destroy' => 'backend.blog.destroy',
      'store' => 'backend.blog.store',
			'show' => 'backend.blog.show',
			'update' => 'backend.blog.update',
		]
]);

Route::put('/backend/blog/restore/{blog}', [
	'uses' => 'Backend\BlogController@restore',
	'as' => 'backend.blog.restore'
]);

Route::delete('/backend/blog/force-destroy/{blog}', [
	'uses' => 'Backend\BlogController@forceDestroy',
	'as' => 'backend.blog.force-destroy'
]);
