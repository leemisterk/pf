<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request	as	HttpRequest;
//			use	App\Http\Requests;
			use	Request;

			class	PFJsonController	extends	Controller
			{
				//category section
				public function getCategoryListJson(){
					$categories= \App\Category::all();
					if(count($categories)>0){
						return $categories->toJson();
					}
					return "";
					
				}
				

//book section
				public	function	getBookListJson()
				{
					$books	=	\App\Book::all();
					if	(count($books)	>	0)
					{
						return	$books->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getBookByBookIDJson(HttpRequest	$request,	$book_id)
				{
					$book	=	\App\Book::where('id',	'=',	$book_id)->first();
					return	$book->toJson();
				}

//	chapter section
				public	function	getChapterListJson()
				{
					$chapters	=	\App\Chapter::all();
					if	(count($chapters)	>	0)
					{
						return	$chapters->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getChapterListByBookIDJson($book_id)
				{
					$chapters	=	\App\Chapter::where('book_id',	'=',	$book_id)->get();
					if	(count($chapters)	>	0)
					{
						return	$chapters->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getChapterByChapterIDJson($chapter_id)
				{
					$chapter	=	\App\Chapter::where('id',	'=',	$chapter_id)->first();
					if	($chapter	!=	NULL)
					{
						return	$chapter->toJson();
					}
					else
					{
						return	"";
					}
				}

//				lesson section
				public	function	getLessonListJson()
				{
					$lessons	=	\App\Lesson::all();
					if	(count($lessons)	>	0)
					{
						return	$lessons->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getLessonListByBookIDJson($book_id)
				{
					$lessons	=	\App\Chapter::where('book_id',	'=',	$book_id)->get();
					if	(count($lessons)	>	0)
					{
						return	$lessons->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getLessonListByChapterIDJson($chapter_id)
				{
					$lessons	=	\App\Lesson::where('chapter_id',	'=',	$chapter_id)->get();
					if	(count($lessons)	>	0)
					{
						return	$lessons->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getLessonByLessonIDJson($lesson_id)
				{
					$lesson	=	\App\Lesson::where('id',	'=',	$lesson_id)->get();
					if	(count($lesson)	>	0)
					{
						return	$lesson->toJson();
					}
					else
					{
						return	"";
					}
				}

//				content section
					public	function	getContentListJson()
				{
					$content	=	\App\Content::all();
					if	(count($content)	>	0)
					{
						return	$content->toJson();
					}
					else
					{
						return	"";
					}
				}
				
				public	function	getContentListByBookIDJson($book_id)
				{
					$contents	=	\App\Content::where('book_id','=',$book_id)->get();
					if	(count($contents)	>	0)
					{
						return	$contents->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getContentListByChapterIDJson($chapter_id)
				{
					$contents	=	\App\Content::where('chapter_id','=',$chapter_id)->get();
					if	(count($contents)	>	0)
					{
						return	$contents->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getContentListByLessonIDJson($lesson_id)
				{
					$contents	=	\App\Content::where('lesson_id','=',$lesson_id)->get();
					if	(count($contents)	>	0)
					{
						return	$contents->toJson();
					}
					else
					{
						return	"";
					}
				}

				public	function	getContentByContentIDJson($content_id)
				{
						$content	=	\App\Content::where('id','=',$content_id)->get();
					if	(count($content)	>	0)
					{
						return	$content->toJson();
					}
					else
					{
						return	"";
					}
				}

			}
			