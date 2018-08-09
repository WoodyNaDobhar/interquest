@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Action
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['actions.update', $action->id], 'method' => 'patch', 'id' => 'editAction']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.actions.update', $action->id], 'method' => 'patch', 'id' => 'editAction']) !!}
				@endif

						@include('actions.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection