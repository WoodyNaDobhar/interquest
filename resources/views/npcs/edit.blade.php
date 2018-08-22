@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Npc
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => ['npcs.update', $npc->id], 'id' => 'editNpc', 'files' => true]) !!}
				@else
					{!! Form::open(['route' => ['api.v1.npcs.update', $npc->id], 'id' => 'editNpc', 'files' => true]) !!}
				@endif

						@include('npcs.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection