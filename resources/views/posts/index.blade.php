@extends('Centaur::layout')

@section('title') 
Algebra Blog | All Posts
@endsection

@section('content')
	<div class="page-header">
        <div class='btn-toolbar pull-right'>
            <a class="btn btn-primary btn-lg" href="{{ route('posts.create') }}">
                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                 Create Post
            </a>
        </div>
        <h1>All Posts</h1>
    </div>
	<div class="row">
		<div class="col-sm-12">
			@if($posts->count() > 0)
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr>
								<th>#</th>
								<th>Title</th>
								<th>Author</th>
								<th>Published</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach($posts as $post)
								<tr>
									<td>{{ $post->id }}</td>
									<td>
										<a href="{{ route('home.post.show', $post->slug) }}" target="_blank">
											{{ $post->title }}
										</a>
									</td>
									<td>{{ $post->user->email }}</td>
									<td>{{ date('d.m.Y H:i', strtotime($post->created_at)) }}</td>
									<td>
										<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-xs">Edit</a>
										<a href="{{ route('posts.destroy', $post->id) }}" class="btn btn-danger btn-xs action_confirm" data-method="delete" data-token="{{ csrf_token() }}">Delete</a>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				{{ $posts->links() }}
			@else
				<h1>Trenutno nema objava!</h1>
			@endif
		</div>
	</div>
@endsection