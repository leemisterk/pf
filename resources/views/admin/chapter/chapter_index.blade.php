@extends('layouts/admin/admin_master')

@section('topnav')
@parent

@endsection

@section('sidebar')
@include('layouts/partial/admin/admin_sidebar')
@endsection


@section('content')

<h1>Chapter index</h1>
<a href="{{action('ChapterController@create')}}"
		class="btn btn-danger">
				New Chapter
</a>
333
@include('layouts/partial/admin/chapter/admin_chapter_index')

@endsection




