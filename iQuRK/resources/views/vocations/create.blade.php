@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Vocation
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">

			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => 'vocations.store', 'id' => 'createVocation']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.vocations.store', 'id' => 'createVocation']) !!}
				@endif

						@include('vocations.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
