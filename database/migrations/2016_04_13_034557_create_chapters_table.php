<?php

			use	Illuminate\Database\Schema\Blueprint;
			use	Illuminate\Database\Migrations\Migration;

			class	CreateChaptersTable	extends	Migration
			{

				/**
					* Run the migrations.
					*
					* @return void
					*/
				public	function	up()
				{
					Schema::create('chapters',	function	(Blueprint	$table)
						{
						$table->increments('id');
						$table->string('chapter_title');
						$table->integer('book_id');
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
					Schema::drop('chapters');
				}

			}
			