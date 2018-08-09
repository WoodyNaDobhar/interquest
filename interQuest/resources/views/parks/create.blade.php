@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Park & Mapkeeper
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">

			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => 'parks.store', 'id' => 'createPark']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.parks.store', 'id' => 'createPark']) !!}
				@endif

						@include('parks.fields')

						@include('personae.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
