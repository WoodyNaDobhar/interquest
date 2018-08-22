@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Persona
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['personae.update', $persona->id], 'files' => true, 'id' => 'editPersona']) !!}
				@else
					{!! Form::open(['route' => ['api.v1.personae.update', $persona->id], 'files' => true, 'id' => 'editPersona']) !!}
				@endif

						@include('personae.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
@section('scripts')
	@parent
	<script src="/js/custom_persona.js"></script>
@endsection