@extends('layouts/admin/admin_master')

@section('sidebar')
@include('layouts/partial/admin/admin_sidebar')
@endsection
@section('content')

<a href="{{action('BookController@create')}}"
		class="btn btn-danger">
				New Book
</a>
@include('layouts/partial/admin/book/admin_book_index')


@endsection




