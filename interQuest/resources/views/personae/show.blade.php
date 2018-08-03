@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			{!! $persona->long_name !!} ({!! $persona->name !!}){!! $persona->is_knight ? ' Defender' : '' !!}{!! $persona->park ? (' of ' . $persona->park->name) : '' !!}
			<a href="{!! route('personae.index') !!}" class="btn btn-default pull-right">Back</a>
		</h1>
	</section>
	<div class="content">
		@include('personae.show_fields')
	</div>
@endsection
