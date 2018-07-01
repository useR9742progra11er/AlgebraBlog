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
				//tu prikazi formu za komentiranje

				<h3>Comments</h3>
				@if (Auth::check())
  				@include('includes.errors')
  					{{ Form::open(['route' => ['comments.store'], 'method' => 'POST']) }}
  			<p>{{ Form::textarea('body', old('body')) }}</p>
  					{{ Form::hidden('post_id', $post->id) }}
  			<p>{{ Form::submit('Send') }}</p>
				{{ Form::close() }}
				@endif
				@forelse ($post->comments as $comment)
  			<p>{{ $comment->user->name }} {{$comment->created_at}}</p>
  			<p>{{ $comment->body }}</p>
  			<hr>
				@empty
  		<p>This post has no comments</p>
			<span>{{$post->comments->count()}} {{ str_plural('comment', $post->comments->count()) }}</span>
			@endforelse

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
