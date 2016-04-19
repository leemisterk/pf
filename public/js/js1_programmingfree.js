$(function(){
	$('#sidebar-toggle').click(function(e){

//	toggle content menu
		e.preventDefault;
		$('#wrapper').toggleClass('menuDisplayed');
	});//end of #content-toggle click function

//close content sidebar
	$('#close-content-sidebar').click(function(e){
		$('#wrapper').toggleClass('menuDisplayed');
	});

	$('#newBook').click(function(e){
		e.preventDefault();

		$('#newBookSection').show();

	});// end of aBook link click 

	//show form for create new chapter when button New Chapter in top is click
	$('body').on('click', '#btnChapterNew', function(e){
		e.preventDefault();
		$('#mainSection').html(PF.chapter.formNew());
	});

	// save new book in bookSection form in admin_index page
	$('body').on('click', '#btnBookNewSave', function(e){
		e.preventDefault();
		PF.book.saveNewAsyn($('#book_title').val());
	});

	//save new chapter in admin_index page
	$('body').on('click', '#btnChapterNewSave', function(e){
		e.preventDefault();
		var book_id = $('#book_id').val();
		if(book_id != ""){
			PF.chapter.saveNewAsyn($('#book_id').val(), $('#chapter_title').val());
		} else{
			alert('no book id to save');
		}
	});



	//save edited book on btnBookEdit_click in admin_index page
	$('body').on('click', '#btnBookEditSave', function(e){
		var book_id = $('#book_id').find(':selected').val();
		var book_title = $('#book_title').val();
		PF.book.saveEditAsyn(book_id, book_title);
		console.log('book title: ' + book_title);

	});

	//delete a book with ajax on btnBookDelete_click in admin_index page 
	$('body').on('click', '#btnBookDelete', function(e){
		var book_id = $('#book_id').find(':selected').val();
		PF.book.deleteBook(book_id);
	});



});// end of ready function

var PF = {
};


PF.url = {
	bookCreate: '/admin/book/create',
	bookStore: '/admin/book',
	bookDelete: '/admin/book'

}

PF.init = {
}


PF.tinymce = {
//	create textarea with tinymce

	initTextArea: function(selector){

		tinymce.init({
			mode: "textareas",
			selector: selector,
			theme: 'modern',
			preview_styles: false,
			skin: "lightgray",
			relative_urls: false,
			document_base_url: "http://localhost:8000/",
			resize: 'both',
			content_css: "/css/tinymce_style1.css",
			plugins: [
				" codesample advlist autolink link image lists charmap print preview hr anchor pagebreak",
				"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
				"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
			],
			menubar: 'file edit insert view format table tools',
			menu: {
				file: {
					title: 'File',
					items: 'newdocument'
				},
				edit: {
					title: 'Edit',
					items: 'undo redo | cut copy paste pastetext | selectall'
				},
				insert: {
					title: 'Insert',
					items: 'link media | template hr'
				},
				view: {
					title: 'View',
					items: 'visualaid fullscreen'
				},
				format: {
					title: 'Format',
					items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'
				},
				table: {
					title: 'Table',
					items: 'inserttable tableprops deletetable | cell row column'
				},
				tools: {
					title: 'Tools',
					items: 'spellchecker code'
				}
			},
			toolbar: 'undo redo codesample image visualblocks | fontsizeselect fontselect | fullscreen | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect | responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ',
			image_advtab: true,
			height: 500,
			fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
			font_formats: 'Khmer OS=khmer os;Time New Roman=Time New Roman;Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;AkrutiKndPadmini=Akpdmi-n',
			external_filemanager_path: "filemanager/",
			filemanager_title: "Responsive Filemanager",
			external_plugins: {
				"filemanager": "/filemanager/plugin.min.js"
			}
		});
	}
}

PF.category = {
	// get category list in json format form category table 
	getCategoryListJson: function(){
		return $.ajax('pfjson/getCategoryListJson');
	},
	createOptionCategory: function(data){
		data = JSON.parse(data);
		var str = "";
		for(var i = 0; i < data.length; i++){
			str += "<option value=' " + data[i].id + " ' >" + data[i].category_value + "</option>";
		}
		return str;
	},
	createSelectCategory2: function(){
		console.log('start');
		var str = "hello";
		$.when(PF.category.getCategoryListJson())
		.done(function(data){
			data = JSON.parse(data);
			str = "<select id='category_id' class='form-control'>";
			for(var i = 0; i < data.length; i++){
				str += "<option value=' " + data[i].id + " ' >" + data[i].category_value + "</option>";
			}
			str += "</select>";
			return str;
		});
	},
	showSelect2: function(){
		$.when(PF.category.createSelectCategory2())
		.done(
		function(data){
			console.log('data2: ' + data);
			return data;
		});
	},
	createSelectCategory: function(obj){
		var str = "";
		data = JSON.parse(obj.data);
		for(var i = 0; i < data.length; i++){
			str += "<option value=' " + data[i].id + " ' >" + data[i].category_value + "</option>";
		}
		$(obj.select_id).html(str);
		return str;
	},
	showSelectCategory: function(destination_id){
		var destination_id = destination_id;
		$.when(PF.category.getCategoryListJson())
		.pipe(function(data){
			return $.Deferred().resolve({
				destination_id: destination_id,
				data: data
			});
		})
		.done(PF.category.createSelectCategory)
	},
	initCategorySelectOption: function(select_id){
		var select_id = select_id;
		$.when(PF.category.getCategoryListJson())
		.pipe(function(data){
			return $.Deferred().resolve({
				select_id: select_id,
				data: data
			});
		})
		.done(PF.category.createSelectCategory)
	},
}
PF.book = {
	//save new book asynchronously 
	saveNewAsyn: function(book_title){

		$.ajax({
			url: "/admin/book",
			type: 'post',
			data: {
				book_title: book_title
			},
			success: function(data){
				console.log(data);
			},
			error: function(){
				console.log('error');
			}
		});
	},
//	save edited book asynchronously
	saveEditAsyn: function(book_id, book_title){
		$.ajax({
			url: '/admin/book/' + book_id,
			data: {
				book_id: book_id,
				book_title: book_title
			},
			type: "PUT",
			success: function(data){
				$("#mainSection").html("<h1 class='text-center'>Update Success</h1>");
				location.reload(true);
			},
			error: function(data){
				$('#mainSection').html("<h1>Updata Failed<h1>");
			}
		});
	},
	deleteBook: function(book_id){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		$.ajax({
			url: 'admin/book/' + book_id,
			type: "DELETE",
			data: {
				book_id: book_id
			},
			success: function(data){
				$('#mainSection').html("<h1 > delete sucess</h1>");
			},
			error: function(){
				$('#mainSection').html("<h1> delete failed</h1>");
			}

		});
	},
	// create a form for new book
	createBookFrm: function(){
		console.log('start book form');
		var catfrm = PF.category.createSelectCategory2();
		console.log('catfrm: ' + catfrm);
		var strNewBookFrm = "<h1>Create New Book</h1>" +
		"<label>Book Title</label> " +
		"<input type='text' class='form-control'" +
		"						name='book_title'" +
		"					id='book_title'" +
		"				/>" +
		"Category: "+
		"<select class='form-control' name= 'category_id' id='category_id'></select>" +
		"<input type='submit' class='btn btn-danger form-control' value='Save'" +
		"						name='btnBookNewSave'" +
		"					id='btnBookNewSave'/>";
		PF.category.initCategorySelectOption('#category_id');

		return strNewBookFrm;
	},
	formEdit: function(book_title){
		var strEditBookFrm = "<h1>Edit Book</h1>" +
		"<label>Book Title</label> " +
		"<input type='text' class='form-control'" +
		"						name='book_title'" +
		"					id='book_title'" +
		"value='" + book_title + "'" +
		"				/>" +
		"<input type='submit' class='btn btn-danger form-control' value='Save'" +
		"						name='btnBookEditSave'" +
		"					id='btnBookEditSave'/>" +
		"<input type='submit' class='btn btn-warning form-control' value='Delete Book'" +
		"						name='btnBookDelete'" +
		"					id='btnBookDelete'/>";
		return strEditBookFrm;
	}

}
PF.chapter = {
	saveNewAsyn: function(book_id, chapter_title){
		$.ajax({
			url: "/admin/chapter",
			type: 'post',
			data: {
				book_id: book_id,
				chapter_title: chapter_title
			},
			success: function(data){
				console.log(data);
			},
			error: function(){
				console.log('error');
			}
		});
	},
	formNew: function(){
		var formChapterNew = "<label>Chapter Title</label> " +
		"<input type='text' class='form-control'" +
		"						name='chapter_title'" +
		"					id='chapter_title'" +
		"				/>" +
		"<input type='submit' class='btn btn-danger form-control' value='Save'" +
		"						name='btnChapterNewSave'" +
		"					id='btnChapterNewSave'/>";
		return formChapterNew;
	}
}

PF.content = {
	saveNewContent: function(book_id,
	chapter_id,
	lesson_id,
	content,
	content_category,
	content_position,
	content_position_ref)
	{
		console.log('book_id: ' + book_id);
		console.log('chapter_id: ' + chapter_id);
		console.log('lesson_id: ' + lesson_id);
		console.log('content_category: ' + content_category);
		console.log('content_position: ' + content_position);
		console.log('content_position_ref: ' + content_position_ref);
		console.log('content: ' + content);
		$.ajax({
			url: 'admin/content',
			type: 'POST',
			data: {
				book_id: book_id,
				chapter_id: chapter_id,
				lesson_id: lesson_id,
				content: content,
				content_category: content_category,
				content_position: content_position,
				content_position_ref: content_position_ref
			},
			success: function(data){
				$('#mainSection').html('<h1>Content Save Successful/h1>');
			},
			error: function(data){
				$('#mainSection').html('<h1>Content Save Failed</h1>');
			}
		});
	},
	saveEditedContent: function(){

	},
	initSelectContentList: function(lesson_id){
		$.ajax({
			url: 'admin/content/list_by_lesson_id',
			type: "GET",
			data: {
				lesson_id: lesson_id
			},
			success: function(data){
				var contentList = JSON.parse(data);
				var str = "<select id='content_id'>";
				for(var i = 0; i < contentList.length; i++){
					str += "<option value=' " + content[i].id + " '> " + content[i].id + "</option>";

				}
				str += "</select>";
				return str;
			},
			error: function(data){

			}
		});
	}
}

