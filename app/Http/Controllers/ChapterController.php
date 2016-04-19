<?php

			namespace	App\Http\Controllers;

//			use	App\Http\Requests;
			use	Illuminate\Http\Request	as	HttpRequest;
			use	Request;

			class	ChapterController	extends	Controller
			{

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index(HttpRequest	$request)
				{

					if(Request::ajax()){
						$book_id=$request->input('book_id');
						$chapters= \App\Chapter::where('book_id','=',$book_id)->get();
						
						return $chapters->toJson();
					}					
					return	view('admin.chapter.chapter_index');
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					return	view('admin.chapter.chapter_create');
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(HttpRequest	$request)
				{
					if	(Request::ajax())
					{
						$chapter_title										=	"";
						$chapter																=	new	\App\Chapter();
						$chapter_title										=	htmlspecialchars($request->input('chapter_title'));
						$book_id																=	htmlspecialchars($request->input('book_id'));
						$chapter->chapter_title	=	$chapter_title;
						$chapter->book_id							=	$book_id;
						$chapter->save();
						return	"ok";
					}

					return	redirect()->back();
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show(Request	$request,	HttpRequest	$httpRequest,	$book_id)
				{
					if	(Request::ajax())
					{
						$book_id	=	0;

						$book_id		=	$httpRequest->input('selBook');
						$chapters	=	\App\chapter::where('book_id',	'=',	$book_id)->get();

						return	$chapters->toJson();
					}
					return	"non ajax";
//					return	view('admin.chapter.chapter_show');
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{
					return	view('admin.chapter.chapter_edit');
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
					//
				}

				/**
					* Remove the specified resource from storage.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	destroy($id)
				{
					//
				}

			}
			