<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request	as	HttpRequest;
			use	Request;

//use App\Http\Requests;

			class	ContentController	extends	Controller
			{

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index(HttpRequest	$request)
				{
						$contents		=	\App\Content::all();
					
					if	(Request::ajax())
					{
						$lesson_id	=	$request->input('lesson_id');
						$contents		=	\App\Content::where('lesson_id',	'=',	$lesson_id)->get();
						return	$contents->toJson();
					}
					return	view('admin.content.content_index',	['contents'	=>	$contents]);
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					return	view('admin.content.content_create');
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(HttpRequest	$request)
				{
					$content										=	new	\App\Content();
					$book_id										=	"";
					$chapter_id							=	"";
					$lesson_id								=	"";
					$content_category	=	"";
					$content_content		=	"";

					$book_id										=	htmlspecialchars($request->input('book_id'));
					$chapter_id							=	htmlspecialchars($request->input('chapter_id'));
					$lesson_id								=	htmlspecialchars($request->input('lesson_id'));
					$content_category	=	htmlspecialchars($request->input('content_category'));

					switch	(trim($content_category))
					{
						case	'text':
							$content_content	=	htmlentities($request->input('content'));
							break;

						case	'image':
							$content_content	=	htmlentities($request->input('content'));
							break;
						case	'code':
							$content_content	=	htmlentities($request->input('content'));
							break;
					}

					$content->book_id										=	$book_id;
					$content->lesson_id								=	$lesson_id;
					$content->chapter_id							=	$chapter_id;
					$content->content_category	=	$content_category;
					$content->content										=	$content_content;
					if	(Request::ajax())
					{
						$content->save();
						return	"save content ok";
					}
					return	redirect()->back();
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show($id)
				{
					return	view('admin.content.content_show');
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{
					return	view('admin.content.content_edit');
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
			