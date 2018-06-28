@extends('Centaur::layout')

@section('title') 
Algebra Blog | {{ $post->title }}
@endsection

@section('content')
	<div class="page-header">
        <h1>{{ $post->title }}</h1>
		<small>Author: {{ $post->user->email }}</small><br>
		<small>Published: {{ \Carbon\Carbon::createFromTimestamp(strtotime($post->created_at))->diffForHumans() }}</small>
    </div>
	<div class="row">
		<div class="col-sm-12">
			{!! $post->content !!}
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			@if(Sentinel::check())
				tu prikazi formu za komentiranje
			@else
				tu prikazi link za login
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			ispis svih komentara $post->comment
		</div>
	</div>
@endsection