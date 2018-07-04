<?php
 		date_default_timezone_set('Europe/Zagreb');
?>
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
				<!--tu prikazi formu za komentiranje-->
			</br>
			</br>
			<h3><b>Add new Comment</b></h3>
			<?php
			echo "<form>
					<input type='hidden' name='user_id' value='Anonymous'>
					<input type='hidden' name='created_at' value='".date('Y-m-d H:i:s')."'>
					<textarea name='body'></textarea><br>
					<button type='submit' name='submit'>Comment</button>
			</form>";
			?>

			@else
				<!--tu prikazi link za login-->
				<a href="http://localhost:8000/login">Login</a>
			@endif
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<!--ispis svih komentara $post->comment-->
		</br>
			<h3><b>Comments</b></h3>
		</br>
			<p>This post has no comments</p>
			<span>{{$post->comments->count()}} {{ str_plural('comment', $post->comments->count()) }}</span>
		</div>
	</div>
@endsection
