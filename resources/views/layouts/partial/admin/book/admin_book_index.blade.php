
@if(count($books)>0)

<table class="table table-bordered table-hover">
		<thead >
		<th class="text-center">ID</th>	
		<th class="text-center">Title</th>
		<th></th>
</thead>
<tbody class="text-center">
		@foreach($books as $book)
		<tr>
				<td>{{$book->id}}</td>				
				<td>{{$book->book_title}}</td>
				<td>						
						<form class="form"
												action="{{action('BookController@destroy',['id'=>$book->id])}}"
												method="POST"
												>
								{!! csrf_field()!!}								
								{!! method_field('DELETE')!!}

								<a class="btn btn-primary"
											href="{{action('BookController@edit',['id'=>$book->id])}}"
											>
										Edit
								</a>
								<input class="btn btn-danger"
															type="submit"
															value="Delete"
															name="btnBookDelete"
															id="btnBookDelete"
															/>					

						</form>
				</td>			
		</tr>

		@endforeach
</tbody>
</table>
@endif

