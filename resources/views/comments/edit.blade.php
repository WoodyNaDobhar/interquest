@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Comment
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['comments.update', $comment->id], 'method' => 'patch', 'id' => 'editComment']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.comments.update', $comment->id], 'method' => 'patch', 'id' => 'editComment']) !!}
				@endif

						@include('comments.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection