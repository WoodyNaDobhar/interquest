@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Park
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['parks.update', $park->id], 'method' => 'patch', 'id' => 'editPark']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.parks.update', $park->id], 'method' => 'patch', 'id' => 'editPark']) !!}
				@endif

						@include('parks.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection