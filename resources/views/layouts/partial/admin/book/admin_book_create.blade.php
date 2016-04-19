<h1>Create New Book</h1>
<form class="form"
						action="{{action('BookController@store')}}"
						method="POST"
						enctype="multipart/form-data">

		{!! csrf_field()!!}

		<div class="form-group">
				<label> Book Title</label>				
				<input class="form-control"
											type="text" name="book_title" id="book_title" />
		</div>		
		<input class="form-control btn btn-primary"
									type="submit" name="btnBookSave" id="btnBookSave"
									value="Save" />


</form>


