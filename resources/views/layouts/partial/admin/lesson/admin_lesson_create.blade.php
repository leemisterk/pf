
<form action="{{action('LessonController@store')}}" 
						method="POST"
						enctype="multipart/form-data"
						>


		{!! csrf_field()!!}
		{!! method_field('POST') !!}

		<br>

		<label for="book_id">Book</label>
		<select name="book_id" id = 'book_id'
										class="form-control">	
				<option value="">Please Select a Book</option>

		</select>


		<label for="chapter_id">Chapter</label>
		<select name="chapter_id" id = 'chapter_id'
										class="form-control">

				<option value="">Please Select a Chapter</option>

		</select>


		<div class="form-group form-horizontal">
				<label for="lesson_title">Lesson Title</label>
				<input class="form-control form-horizontal" type="text" 
											name="lesson_title" 
											id="lesson_title"
											placeholder="lesson title here">
		</div>
		<input id="btnLessonSave"
									type="submit" value="Save" 
									class="btn btn-primary form-control"/>


</form>

<script>
	$(function(){
		//initialize book 
		$.get('/admin/book', function(data){
			var option = "<option value='NULL'>----Select a book----</option>";
			var books = JSON.parse(data);
			for(var i = 0; i < books.length; i++){
				option += "<option value='" + books[i].id + "'>" + books[i].book_title + "</option>";

			}
			$('#book_id').html(option);
			console.log("length: " + books.length);
			console.log(books);
		}); // end of ajax get /admin/book 
// end of initialized book selection

	//initialize chapter when book selection change
		$('#book_id').change(function(){
			var book_id = $(this).find(':selected').val();
			$.get('/admin/chapter',
			{
				book_id: book_id
			},
			function(data){
				var chapters = JSON.parse(data);
				var chaptersOption = "<option value='NULL'>----select a chapter-----</option>";

				for(var i = 0; i < chapters.length; i++){
					chaptersOption += "<option value='" + chapters[i].id + "'>" + chapters[i].chapter_title + "</option>";
				}
				$('#chapter_id').html(chaptersOption);
//console.log("chapters: " + data)
			});//end of ajax get to /admin/chapter
			console.log('book title: ' + $(this).find(':selected').val());

		});//end of book_id click
		
	})// end of ready
	
	
</script>
