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
					{!! Form::open(['route' => ['vocations.update', $vocation->id], 'method' => 'patch', 'id' => 'editVocation']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.vocations.update', $vocation->id], 'method' => 'patch', 'id' => 'editVocation']) !!}
				@endif

						@include('vocations.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection