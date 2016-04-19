<?php

			use	Illuminate\Database\Schema\Blueprint;
			use	Illuminate\Database\Migrations\Migration;

			class	CreateContentTable	extends	Migration
			{

				/**
					* Run the migrations.
					*
					* @return void
					*/
				public	function	up()
				{
					Schema::create('contents',	function	(Blueprint	$table)
						{
						$table->increments('id');
						$table->integer('book_id');
						$table->integer('lesson_id');
						$table->integer('chapter_id');
						$table->enum('content_category',['text','code','image','video','sound']);
						$table->text('content');
						$table->timestamps();
						});
				}

				/**
					* Reverse the migrations.
					*
					* @return void
					*/
				public	function	down()
				{
					Schema::drop('contents');
				}

			}
			