<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request	as	HttpRequest;
//			use	App\Http\Requests;
			use	Request;

			class	BookController	extends	Controller
			{

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index()
				{
					$books	=	\App\Book::all();
					if	(Request::ajax())
					{
						return	$books->toJson();
					}

					return	view('admin/book/book_index',	['books'	=>	$books]);
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					
					return	view('admin/book/book_create');
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(HttpRequest	$request)
				{

					$book_title	=	"";
					$book							=	new	\App\Book();
					$book_title	=	htmlspecialchars($request->input('book_title'));

					$book->book_title	=	$book_title;

					$book->save();
					if	(Request::ajax())
					{
						return	"ok";
					}

					return	redirect()->action('BookController@index');
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show($id)
				{
					//
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{
					//
				}

				/**
					* Update the specified resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	update(HttpRequest	$request,	$book_id)
				{
					$book	=	\App\Book::where('id',	'=',	$book_id)->first();
					if	(Request::ajax())
					{
						$book->book_title	=	htmlspecialchars($request->input('book_title'));
						$book->save();
						return	'ok';
					}
					return	redirect()->back();
				}

				/**
					* Remove the specified resource from storage.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	destroy($book_id)
				{
					if	(Request::ajax())
					{
						\App\Book::destroy($book_id);
						return	"ok";
					}
					return redirect()->back();
				}

			}
			