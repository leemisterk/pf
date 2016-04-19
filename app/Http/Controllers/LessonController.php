<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request	as	HttpRequest;
			use	Illuminate\Support\Facades\DB;
			use	Request;

			class	LessonController	extends	Controller
			{

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index(HttpRequest	$request)
				{
					$chapter_id	=	$request->input('chapter_id');
					$lessons				=	\App\Lesson::where('chapter_id',	'=',	$chapter_id)->get();
					if	(Request::ajax())
					{
						return	$lessons->toJson();
					}
					return	view('admin.lesson.lesson_index',	['lessons'	=>	$lessons]);
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					return	view('admin.lesson.lesson_create');
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(Request	$request)
				{
					$lesson_title	=	$request->input('lesson_title');
					$book_id						=	$request->input('book_id');
					$chapter_id			=	$request->input('chapter_id');


					$lesson															=	new	\App\Lesson();
					$lesson->lesson_title	=	$lesson_title;
					$lesson->book_id						=	$book_id;
					$lesson->chapter_id			=	$chapter_id;

					$lesson->save();
					return	redirect()->action('LessonController@index');
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show($id)
				{
					return	view('admin.lesson.lesson_show');
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{
					return	view('admin.lesson.lesson_edit');
				}

				/**
					* Update the specified resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	update(Request	$request,	$id)
				{
					return	"update";
				}

				/**
					* Remove the specified resource from storage.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	destroy($id)
				{
					return	"destory";
				}

			}
			