@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Terrain
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['terrains.update', $terrain->id], 'method' => 'patch', 'id' => 'editTerrain']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.terrains.update', $terrain->id], 'method' => 'patch', 'id' => 'editTerrain']) !!}
				@endif

						@include('terrains.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection