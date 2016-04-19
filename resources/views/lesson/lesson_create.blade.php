<!DOCTYPE html>
<html>
		<head> 
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("js/jquery-1.11.3.js")}} type="text/javascript"></script>
				<script src={{asset("css/bootstrap-3.3.6-dist/js/bootstrap.js")}} type="text/javascript"></script>
				<link href={{asset("css/bootstrap-3.3.6-dist/css/bootstrap-theme.css")}} rel="stylesheet" type="text/css"/>
				<script src={{asset("tinymce/tinymce.min.js")}} type="text/javascript"></script>
				<script src={{asset("tinymce/jquery.tinymce.min.js")}} type="text/javascript"></script>
		</head>

		<body>

				<form class="form"
										action="{{action('LessonController@store')}}"
										method="POST"
										enctype="multipart/form-data">

						{!! csrf_field()!!}

						<div class="form-group">
								<label> Lesson Title</label>
								<input class="form-control"
															type="text" name="lesson_title" 
															id="lesson_title" />
						</div>


						<label> content</label><br>
						<textarea  id="txar_lesson_content"											
																	name="lesson_content" 												

																	>

						</textarea>



						<div class="form-group">


								<input class="form-control btn btn-primary"
															type="submit" name="btnBookSave" id="btnBookSave"
															value="Save" />
						</div>

				</form>

				<script>
$(function(){
	tinymce.init({
		selector: '#txar_lesson_content',
		content_css:"{{asset('css/tinymce_style1.css')}}",
		fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
		style_formats: [
			{
				title: 'khmeros',
				inline: 'span',
				styles: {
					'font-family': 'khmeros'
				}
			},
			{
				title: 'Times New Roman',
				inline: 'span',
				styles: {
					'font-family': 'Times New Roman'
				}
			},
			{
				title: 'Arial',
				inline: 'span',
				styles: {
					'font-family': 'Arial'
				}
			},
			{
				title: 'Arial Black',
				inline: 'span',
				styles: {
					'font-family': 'Arial Black'
				}
			},
			{
				title: 'Comic Sans MS',
				inline: 'span',
				styles: {
					'font-family': 'Comic Sans MS'
				}
			},
			{
				title: 'Verdana',
				inline: 'span',
				styles: {
					'font-family': 'Verdana'
				}
			},
			{
				title: 'Courier New',
				inline: 'span',
				styles: {
					'font-family': 'Courier New'
				}
			},
			{
				title: '8px',
				inline: 'span',
				styles: {
					'font-size': '8px'
				}
			},
			{
				title: '10px',
				inline: 'span',
				styles: {
					'font-size': '10px'
				}
			},
			{
				title: '12px',
				inline: 'span',
				styles: {
					'font-size': '12px'
				}
			},
			{
				title: '14px',
				inline: 'span',
				styles: {
					'font-size': '14px'
				}
			},
			{
				title: '18px',
				inline: 'span',
				styles: {
					'font-size': '18px'
				}
			},
			{
				title: '24px',
				inline: 'span',
				styles: {
					'font-size': '24px'
				}
			},
			{
				title: '36px',
				inline: 'span',
				styles: {
					'font-size': '36px'
				}
			}
		],
	});
});
				</script>

		</body>
</html>


