<?php

			/*
				 |--------------------------------------------------------------------------
				 | Routes File
				 |--------------------------------------------------------------------------
				 |
				 | Here is where you will register all of the routes in an application.
				 | It's a breeze. Simply tell Laravel the URIs it should respond to
				 | and give it the controller to call when that URI is requested.
				 |
				*/

			Route::get('/',	function	()
				{
				return	view('admin.admin_index');
				});
			Route::get('/test',	function()
				{
				return	view('test/test');
				});

			Route::get('/test/bootstrap/navigation_bar',	function()
				{
				return	view('test/bootstrap/navigation_bar');
				});

			Route::get('/test/bootstrap/navigation_bar_prac',	function()
				{
				return	view('test/bootstrap/navigation_bar_prac');
				});

			Route::get('/test/bootstrap/sidebar',	function()
				{
				return	view('test/bootstrap/sidebar');
				});

			Route::get('/test/bootstrap/sidebar_prac',	function()
				{
				return	view('test/bootstrap/sidebar_prac');
				});

			Route::group(['prefix'	=>	'pfjson'],	function()
				{
				// route for category json
				Route::get('getCategoryListJson','PFJsonController@getCategoryListJson'); 				
				//routes for book json
				Route::get('getBookListJson',	'PFJsonController@getBookListJson');
				Route::get('getBookByBookIDJson/{book_id}',	'PFJsonController@getBookByBookIDJson');

				//routes for chapter json
				Route::get('getChapterListJson',	'PFJsonController@getChapterListJson');
				Route::get('getChapterListByBookIDJson/{book_id}',	'PFJsonController@getChapterListByBookIDJson');
				Route::get('getChapterByChapterIDJson/{chapter_id}',	'PFJsonController@getChapterByChapterIDJson');

				// routes for lesson json
				Route::get('getLessonListJson',	'PFJsonController@getLessonListJson');
				Route::get('getLessonListByBookIDJson/{book_id}',	'PFJsonController@getLessonListByBookIDJson');
				Route::get('getLessonListByChapterIDJson/{chapter_id}',	'PFJsonController@getLessonListByChapterIDJson');
				Route::get('getLessonListJson',	'PFJsonController@getLessonListJson');
				Route::get('getLessonByLessonIDJson/{lesson_id}',	'PFJsonController@getLessonByLessonIDJson');

				// routes for content json
				Route::get('getContentListJson',	'PFJsonController@getContentListJson');
				Route::get('getContentListByBookIDJson/{book_id}',	'PFJsonController@getContentListByBookIDJson');
				Route::get('getContentListByChapterIDJson/{chapter_id}',	'PFJsonController@getContentListByChapterIDJson');
				Route::get('getContentListByLessonIDJson/{lesson_id}',	'PFJsonController@getContentListByLessonIDJson');
				Route::get('getContentByContentIDJson/{content_id}','PFJsonController@getContentByContentIDJson');
				});

				Route::resource('admin/category','CategoryController');
			Route::resource('admin/book',	'BookController');


			Route::resource('admin/chapter',	'ChapterController');

			Route::resource('admin/lesson',	'LessonController');
			Route::resource('admin/content',	'ContentController');

			Route::get('layouts/common',	function()
				{
				return	view('layouts.common.master');
				});
			Route::get('admin',	function()
				{
				return	view('admin.admin_index');
				});
			/*
				 |--------------------------------------------------------------------------
				 | Application Routes
				 |--------------------------------------------------------------------------
				 |
				 | This route group applies the "web" middleware group to every route
				 | it contains. The "web" middleware group is defined in your HTTP
				 | kernel and includes session state, CSRF protection, and more.
				 |
				*/

			Route::group(['middleware'	=>	['web']],	function	()
				{
				//
				});
			