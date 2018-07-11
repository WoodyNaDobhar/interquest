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
					{!! Form::model($persona, ['route' => ['personae.update', $persona->id], 'method' => 'patch']) !!}

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