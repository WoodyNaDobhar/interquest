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
					{!! Form::open(['route' => 'buildings.store', 'id' => 'createBuilding']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.buildings.store', 'id' => 'createBuilding']) !!}
				@endif

						@include('buildings.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
