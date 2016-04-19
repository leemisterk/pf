@extends('layouts.admin.admin_master')

@section('content')

<h1 class="text-center">Create New Category</h1>
<form action="{{action('CategoryController@store')}}"
						method="POST" >
							
		{{ csrf_field() }}
				
		<div class="from-group">
				<label>Category Value</label>
				<input type="text"
											name="category_value"
											id="category_value"
											class="form-control" />				
		</div>
		
		<input type="submit"
									name="btnCategoryCreateSave"
									class="btn btn-primary" />
									
</form>


@endsection


