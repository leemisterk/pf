<!DOCTYPE html>
<html>
		<head> 
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>
				<link href={{asset("js/jquery-lightness-ui-1.11.4.custom/jquery-ui-1.11.4.custom/jquery-ui.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("public/js/jquery-lightness-ui-1.11.4.custom/jquery-ui-1.11.4.custom/jquery-ui.js")}} type="text/javascript"></script>
				
		</head>

		<body>

				<a href="{{action('LessonController@create')}}"
							class="btn btn-danger"
							>Create Lesson</a>


				@if(count($lessons)>0)

				<table class="table table-bordered table-hover">

						<thead >
						<th class="text-center">ID</th>	
						<th class="text-center">Title</th>	
						<th></th>
						
				</thead>
				<tbody class="text-center">
						@foreach($lessons as $lesson)
						<tr>
								<td>{{$lesson->lesson_id}}</td>				
								<td>{{$lesson->lesson_title}}</td>
								<td>
										
										<textarea cols="60" rows="5">
											Enter code here 	{{$lesson->lesson_content}}
										</textarea>
								</td>
						</tr>

						@endforeach
				</tbody>
		</table>
		@endif		

</body>
</html>


