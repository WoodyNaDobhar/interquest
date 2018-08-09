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
					{!! Form::open(['route' => 'actions.store', 'id' => 'createAction']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.actions.store', 'id' => 'createAction']) !!}
				@endif

						@include('actions.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
