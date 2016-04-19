<div id="admin-sidebar-wrapper">								
		<div	id="close-content-sidebar" class="close-button">
				X
		</div>		
		<ul class="sidebar-nav">													
				<li><a id='aBook'
											href="{{url('/admin')}} ">Book</a></li>
				<li><a href="{{action('ChapterController@index')}}">Chapter</a></li>
				<li><a href="{{action('LessonController@index')}}">Lesson</a></li>
				<li><a href="{{action('ContentController@index')}}">Content</a></li>
		</ul>
</div>