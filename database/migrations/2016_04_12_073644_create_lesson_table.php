<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons',	function	(Blueprint	$table)
						{
						$table->increments('id');				
						$table->string('lesson_title');						
						$table->integer('book_id');
						$table->integer('chapter_id');					
						$table->timestamps();
						});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::drop('lessons');
    }
}
