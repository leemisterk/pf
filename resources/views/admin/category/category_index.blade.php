@extends('layouts.admin.admin_master')

@section('content')

<a href="{{action('CategoryController@create')}}"
			class='btn btn-primary'>
				New Category
</a>
			
@if($categories->count()>0)

<table class="table table-hover">
	
		<thead>
		<th>id</th>
		<th>value</th>		
		<th></th>
		</thead>
		@foreach($categories as $category)
		<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->category_value}}</td>				
				<td>
						<a href="{{action('CategoryController@edit',['category_id'=>$category->id])}}">
								Edit
						</a>
				</td>
		</tr>
	
	@endforeach
</table>

@endif

@endsection

