@extends('layouts/admin/admin_master')

@section('sidebar')
@include('layouts/partial/admin/admin_sidebar')
@endsection
@section('content')

<h1>Lesson index</h1>
<a href="{{action('LessonController@create')}}"
		class="btn btn-danger">
				New Lesson
</a>


@endsection




