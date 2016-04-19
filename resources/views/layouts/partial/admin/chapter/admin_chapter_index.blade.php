<?php
			$books	=	\App\Book::all();
?>

@if(count($books)>0)

<div class="form-inline">
		<label for="selBook">Select a Book</label>
		<select name="selBook" id="selBook"
										class="form-control">
				@foreach($books as $book) 
				<option value="{{$book->id}}">{{$book->book_title}}</option>
				@endforeach
		</select>
</div>
@endif

<a href="{{action('ChapterController@show',['book_id'=>1])}}"
			class="btn btn-danger btnShowChapter">
		Show Chapter
</a>
<div id='chapterShowSection'>

</div>

<script>
	$(function(){
		$('.btnShowChapter').click(function(e){
			e.preventDefault();
			var book_id=$('#selBook').val();
			$.get('/admin/chapter/2', {selBook:book_id},function(data){
				
				$chapters= JSON.parse(data);
				var str="<table class='table'>";
				for(var i=0; i< $chapters.length;i++){
					str+= "<tr><td>"+ $chapters[i].chapter_title +"</td></tr>";
				}
				 str +="</table>"
				
				$('#chapterShowSection').html($chapters.length + str);
			})
		

		}); //end of btnShowChapter click
	}); //end of ready
</script>


