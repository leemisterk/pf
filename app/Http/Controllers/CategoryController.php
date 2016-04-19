<?php

			namespace	App\Http\Controllers;

			use	Illuminate\Http\Request;
			use	App\Http\Requests;

			class	CategoryController	extends	Controller
			{

				/**
					* Display a listing of the resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	index()
				{
					$categories	=	\App\Category::all();
					return	view('admin.category.category_index',	['categories'	=>	$categories]);
				}

				/**
					* Show the form for creating a new resource.
					*
					* @return \Illuminate\Http\Response
					*/
				public	function	create()
				{
					return view('admin.category.category_create');
				}

				/**
					* Store a newly created resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @return \Illuminate\Http\Response
					*/
				public	function	store(Request	$request)
				{
					$category= new \App\Category();
					$category_value= "";
				
					$category_value= htmlspecialchars($request->input('category_value'));
				
					
					$category->category_value=$category_value;
				
					$category->save();
					
					return redirect()->action('CategoryController@index');
					//
				}

				/**
					* Display the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	show($id)
				{
					$category= \App\Category::where('id','=',$id)->first();
					return view('admin.category.category_show',['category'=>$category]);
				}

				/**
					* Show the form for editing the specified resource.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	edit($id)
				{
					$category= \App\Category::where('id','=',$id)->first();
					return view('admin.category.category_edit',['category'=>$category]);
				}

				/**
					* Update the specified resource in storage.
					*
					* @param  \Illuminate\Http\Request  $request
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	update(Request	$request,	$category_id)
				{
					$category= \App\Category::where('id','=',$category_id)->first();					
					$category_value= htmlspecialchars($request->input('category_value'));
					
					$category->category_value=$category_value;
			
					$category->save();
					
					return redirect()->action('CategoryController@index');
				}

				/**
					* Remove the specified resource from storage.
					*
					* @param  int  $id
					* @return \Illuminate\Http\Response
					*/
				public	function	destroy($id)
				{
					\App\Category::destroy($id);
					return redirect()->action('CategoryController@index');
				}

			}
			