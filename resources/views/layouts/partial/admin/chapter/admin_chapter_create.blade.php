<?php
			$books	=	\App\Book::all();
?>

<form action="{{action('ChapterController@store')}}" 
						method="POST"
						enctype="multipart/form-data"
						>

		{!! csrf_field()!!}
		{!! method_field('POST') !!}

		<div class="form-group form-inline">
				@if(count($books)>0)

				<label for="selBook">Book</label>
				<select name="selBook" id = 'selBook'
												class="form-control">
						@foreach($books as $book) 
						<option value="{{$book->id}}">{{$book->book_title}}</option>
						@endforeach
				</select>
				@endif
				<a href="{{action('BookController@create')}}"
							class="btn btn-danger">
						New Book
				</a>
		</div>

		<div class="form-group form-horizontal">
				<label for="txtChapterTitle">Chapter Title</label>
				<input class="form-control form-horizontal" type="text" 
											name="txtChapterTitle" 
											id="txtChapterTitle"
											placeholder="chapter title here">
		</div>
		<input id="btnChapterSave"
									type="submit" value="Save" 
									class="btn btn-primary form-control"/>


</form>

<script>
	$(function(){
		$('#btnChapterSave').click(function(e){
			e.preventDefault();
			var txtChapterTitle = $('#txtChapterTitle').val();
			var selBook = $('#selBook').val()
			$.post('/admin/chapter',
			{
				txtChapterTitle: txtChapterTitle,
				selBook: selBook
			},
			function(data){
				alert(data);
			}
			);
			console.log("title: " + txtChapterTitle);
			console.log('book_id: ' + selBook);
		});
	})// end of ready
</script>
