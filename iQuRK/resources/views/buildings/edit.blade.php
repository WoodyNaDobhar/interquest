@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Building
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['buildings.update', $building->id], 'method' => 'patch', 'id' => 'editBuilding']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.buildings.update', $building->id], 'method' => 'patch', 'id' => 'editBuilding']) !!}
				@endif

						@include('buildings.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection