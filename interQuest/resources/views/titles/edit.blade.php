@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Title
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['titles.update', $title->id], 'method' => 'patch', 'id' => 'editTitle']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.titles.update', $title->id], 'method' => 'patch', 'id' => 'editTitle']) !!}
				@endif

						@include('titles.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection