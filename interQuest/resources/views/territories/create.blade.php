@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Territory
			<button class="btn btn-default pull-right randomizeTerritory">Randomize!</button>
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">

			<div class="box-body">
				<div class="row">
				@if (Request::segment(1) != 'sparse')
					{!! Form::open(['route' => 'territories.store', 'id' => 'createTerritory']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.territories.store', 'id' => 'createTerritory']) !!}
				@endif
						@include('territories.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
