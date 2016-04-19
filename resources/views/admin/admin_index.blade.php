@extends('layouts/admin/admin_master')

@section('header')

@parent
<style>
		#load_screen{
						background: #000;
						opacity:1;
						position:fixed;
						z-index: 10;
						top: 0px;
						width: 100%;
						height: 1000px;
		}

		#load_screen > #loading{
						color: #FFF;
						width: 120px;
						height: 24px;
						margin:300px auto;

		}
</style>
<script>
	function showScreen(){
		document.body.removeChild(load_screen);
	}
	window.addEventListener('load', function(){
		var load_screen = document.getElementById('load_screen');
		setTimeout(showScreen, 500);
	})
</script>
@endsection

@section('topnav')
<div id="load_screen">
		<div id="loading">
				<img src="{{asset('images/loading.gif')}}"
									class="img-responsive" />
		</div>
</div>
@parent
@endsection

@section('sidebar')
@parent
@endsection

@section('content')


<br>
<div class="row">
		<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Book  </span>
				<select name="book_id" id = 'book_id'
												class="form-control">	
						<option value="">Please Select a Book</option>
				</select>
				<div class="input-group-btn">
						<!-- Buttons -->
						<a href="#"
									name='btnBookShow'
									id='btnBookShow'

									class="btn btn-primary"> Show</a>
						<a href="#"
									name='btnBookEdit'
									id='btnBookEdit'
									class="btn btn-danger"> Edit</a>
						<a href="{{action('BookController@create')}}"
									name='btnBookNew'
									id='btnBookNew'
									class="btn btn-success"> New</a>				

				</div>
		</div>

		<div class="input-group">	
				<span class="input-group-addon" id="basic-addon1">Chapter</span>
				<select name="chapter_id" 
												id = 'chapter_id'
												class="form-control">
						<option value="">--------------------</option>
				</select>
				<div class="input-group-btn">
						<!-- Buttons -->
						<a href="#"
									class="btn btn-primary"> Show</a>
						<a href="#"
									class="btn btn-danger"> Edit</a>
						<a id='btnChapterNew'
									name='btnChapterNew'
									href="{{action('ChapterController@create')}}"
									class="btn btn-success"> New</a>									

				</div>
		</div>

		<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Lesson</span>
				<select name="lesson_id" id = 'lesson_id'
												class="form-control">
						<option value="">--------------------</option>
				</select>
				<div class="input-group-btn">
						<!-- Buttons -->
						<a href="#"
									class="btn btn-primary"> Show</a>
						<a href="#"
									class="btn btn-danger"> Edit</a>
						<a id='btnLessonNew'
									name='btnLessonNew'
									href="{{action('LessonController@create')}}"

									class="btn btn-success"> New</a>	

				</div>
		</div>
</div>
<br>
<div class="row">
		<div class="input-group">
				<span class="input-group-addon">
						<label class="radio-inline">
								<input name='content_position' type="radio" value='0' />Beginning
						</label>
						<label class="radio-inline">
								<input name='content_position' type="radio" value='1' />Before
						</label>
						<label class="radio-inline">
								<input name='content_position' type="radio" value='2' />After
						</label>
						<label class="radio-inline">
								<input name='content_position' type="radio" value='3' />End
						</label>
				</span>
				<select id="content_id"
												class="form-control">
						<option>-------------- -----</option>
				</select>


				<!-- Buttons -->
				<div class="input-group-btn">								
						<ul class="dropdown-menu">
								<li>
										<a id="content_category_text"
													href="#">Text</a>
								</li>
								<li>
										<a id="content_category_code"
													href="#">Code</a>
								</li>										
								<li>
										<a id="content_category_image"
													href="#">Image</a>
								</li>										

						</ul>
						<a class="btn btn-primary">
								Show
						</a>
						<a class="btn btn-danger">
								Edit
						</a>
						<button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								New Content 
								<span class="caret"></span>
						</button>
						<input id="btnContentSave"
													name="btnContentSave"
													type="submit" 
													class="btn btn-danger" 
													value="Save"/>


				</div><!-- /btn-group -->						

		</div>		
</div>
<br>
<div class="row">
		<button class="btn btn-danger"
										id="btnAddClass">Add Responsive Class</button>

		<div id="mainSection">

		</div>	

</div>


<script>
	$(function(){
		
// add img-responsive class to img element to make images responsive
		$('#btnAddClass').click(function(e){
			e.preventDefault();
			tinymce.activeEditor.dom.addClass(tinymce.activeEditor.dom.select('img'), 'img-responsive');
		});

		$('#btnContentSave').click(function(e){
			tinymce.triggerSave();
			var book_id = $('#book_id').find(':selected').val();
			var chapter_id = $('#chapter_id').find(':selected').val();
			var lesson_id = $('#lesson_id').find(':selected').val();
			var content_position = $('input[name="content_position"][type="radio"]').find(":selected").val();
			var content_category = "text";
			var content_position_ref = "";
			var content = $('textarea#text').val();
//			var content= "hello";
			PF.content.saveNewContent(
			book_id,
			chapter_id,
			lesson_id,
			content,
			content_category,
			content_position,
			content_position_ref);
		});

		//initialize form for creating new book on btnBookNew_ click in admin_index page  
		$('#btnBookNew').click(function(e){
			e.preventDefault();			
			$('#mainSection').html(PF.book.createBookFrm());
			
		});		

		//initialize form for editing book on btnBookEdit_click in admin_index page
		$('#btnBookEdit').click(function(e){
			e.preventDefault();
			var book_id = $('#book_id').find(':selected').val();
			if(book_id != ""){
				var book_title = $('#book_id').find(':selected').text();
				$('#mainSection').html(PF.book.formEdit(book_title));
			} else{
				$('#mainSection').html("");
				alert('select a book!');
			}

		});

		//initialize textarea for text
		$('#content_category_text').click(function(){
			tinymce.remove();
			$('#mainSection').html('<textarea id="text"></textarea>');
			PF.tinymce.initTextArea('#text');
		}); // end of content_category_text click event
		//end of show textarea


		//initialize textarea for code when content_category_code button click event
		$('#content_category_code').click(function(){
			tinymce.remove();
			$('#mainSection').html('<textarea id="code"></textarea>');
			PF.tinymce.initTextArea('#code');
		}); // end of content_category_code click event

		//initialize textarea for image
		$('#content_category_image').click(function(){
			tinymce.remove();
			$('#mainSection').html('<textarea id="image"></textarea>');
			PF.tinymce.initTextArea('#image');
		}); // end of content_category_image click_event

		//initialize book list
		$.get('/admin/book', function(data){
			var option = "<option value='' >Please Select a Book</option>";
			var books = JSON.parse(data);
			for(var i = 0; i < books.length; i++){
				option += "<option value='" + books[i].id + "'>" + books[i].book_title + "</option>";
			}
			$('#book_id').html(option);
			//			console.log("length: " + books.length);
			//			console.log(books);
		}); // end of ajax get /admin/book 
		// end of initialized book list

		//initialize chapter list for certain book when book selection change
		$('#book_id').change(function(){
			var book_id = $(this).find(':selected').val();
			if(book_id != ""){
				$.get('/admin/chapter',
				{
					book_id: book_id
				},
				function(data){
					var chapters = JSON.parse(data);
					var chaptersOption = "<option value=''>----select a chapter-----</option>";
					for(var i = 0; i < chapters.length; i++){
						chaptersOption += "<option value='" + chapters[i].id + "'>" + chapters[i].chapter_title + "</option>";
					}
					$('#chapter_id').html(chaptersOption);
					//				console.log('chapter: ' + chaptersOption);

					//console.log("chapters: " + data)
				}); //end of ajax get to /admin/chapter
				//			console.log('book title: ' + $(this).find(':selected').val());
			} else{
				$('#chapter_id').html("<option value=''>--------------------</option>");
			}// end of if(book_id!="")
		}); //end of book_id click
		//end of initialized chapter selection

		//initialize lesson list for certain chapter when chapter_id change
		$('#chapter_id').change(function(){
			var chapter_id = $(this).find(':selected').val();
			if(chapter_id != ""){
				//			chapter_id = parseInt(chapter_id);
				$.get('/admin/lesson',
				{
					chapter_id: chapter_id
				},
				function(data){
					var lessons = JSON.parse(data);
					var lessonOption = "<option value=''>----select a lesson ----</option>";
					for(var i = 0; i < lessons.length; i++){
						lessonOption += "<option value='" + lessons[i].id + "'>" + lessons[i].lesson_title + "</option>";
					}
					$('#lesson_id').html(lessonOption);
				}
				); // end of ajax get to /admin/lesson
			} else{
				$('#lesson_id').html("<option value=''>--------------------</option>");
			}// end of if(chpater_id!="")
		}); //end of chapter_id change event

		$('#lesson_id').change(function(){
			console.log('content select star');
			var lesson_id = $(this).find(':selected').val();
			if(lesson_id != ""){
				//			chapter_id = parseInt(chapter_id);
				$.get('/admin/content',
				{
					lesson_id: lesson_id
				},
				function(data){
					var contents = JSON.parse(data);
					console.log(contents);
					var contentOption = "<option value=''>----select a content id ----</option>";
					for(var i = 0; i < contents.length; i++){
						contentOption += "<option value='" + contents[i].id + "'>" + contents[i].id + "</option>";
					}
					$('#content_id').html(contentOption);
				}
				); // end of ajax get to /admin/lesson
			} else{
				$('#content_id').html("<option value=''>--------------------</option>");
			}// end of if(lesson_id!="")

			console.log('content select end');
		});

	}); //end of ready
</script>
@endsection


