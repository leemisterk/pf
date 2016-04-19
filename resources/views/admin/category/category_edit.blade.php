@extends('layouts.admin.admin_master')

@section('content')



<h1 class="text-center">Editting Old Category</h1>
@if(count($category)>0)
<form action="{{action('CategoryController@update',['category_id'=>$category->id])}}"
						method="POST" >
							
		{{ csrf_field() }}
		{{ method_field('PUT')}}
				
		<div class="from-group">
				<label>Category Value</label>
				<input type="text"
											name="category_value"
											id="category_value"
											class="form-control" 
											value='{{$category->category_value}}'
											/>
				
		</div>
		
		<input type="submit"
									name="btnCategoryEditSave"
									class="btn btn-primary" />
		
									
</form>
<form action='{{action("CategoryController@destroy",['id'=>$category->id])}}'
	method="POST">
		{{ csrf_field()}}
		{{method_field('DELETE')}}
		<input type="submit"
									class="btn btn-danger"
									value="Delete" />
	</form>
@endif

@endsection


