@extends('layouts/admin/admin_master')

@section('sidebar')
@include('layouts/partial/admin/admin_sidebar')
@endsection
@section('content')

<h1>Content index</h1>

@if(count($contents)>0)

@foreach($contents as $content)
<div class="row">
		<div style="border: 1px solid red">
				{!! htmlspecialchars_decode($content->content) !!}			
		</div>
</div>

<br>

@endforeach
@endif

@endsection




