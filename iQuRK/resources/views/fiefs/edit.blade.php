@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Fief
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['fiefs.update', $fief->id], 'method' => 'patch', 'id' => 'editFief']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.fiefs.update', $fief->id], 'method' => 'patch', 'id' => 'editFief']) !!}
				@endif

						@include('fiefs.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection