@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" action="{{route('posts.store') }}" method="post">
						<input type="hidden" value="{{csrf_token()}}" name="_token">
						<div class="form-group">
							<label for="inputEmail3" class="hidden control-label">Email</label>
							<div class="col-sm-12">
								<textarea class="form-control" name="body" id="" rows="10"
										  placeholder="What's on your mind?"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-11 col-sm-1">
								<button type="submit" class="btn btn-default">Post</button>
							</div>
						</div>
					</form>
				</div>
			</div>

			@foreach($posts as $post)
				<div class="panel panel-default">
					<div class="panel-body">
						<p>{{$post->user->name}} - {{$post->created_at->diffForHumans()}}</p>

						<p>{{$post->body}}</p>
					</div>
					<div class="panel-footer">
						<form class="form-inline" action="{{route('comments.store', $post->id)}}" method="post">
							<input type="hidden" value="{{csrf_token()}}" name="_token">
							<div class="form-group">
								<label for="body" class="hidden">Name</label>
								<input type="text" class="form-control" id="body" name="body" placeholder="Comments">
							</div>
							<button type="submit" class="btn btn-default">Comment</button>
						</form>
						<hr>
						@foreach($post->comments as $comment)
							<div><span>{{$comment->user->name}}</span>: {{$comment->body}}</div>
						@endforeach
					</div>
				</div>
			@endforeach


		</div>
	</div>
</div>
@endsection
