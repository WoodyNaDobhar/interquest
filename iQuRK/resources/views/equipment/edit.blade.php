@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Equipment
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">
			<div class="box-body">
				<div class="row">
					@if(Request::segment(1) != 'sparse')
						{!! Form::open(['route' => ['equipments.update', $equipment->id], 'method' => 'patch', 'id' => 'editEquipment']) !!}
					@else
						{!! Form::open(['route' => ['api.v1.equipments.update', $equipment->id], 'method' => 'patch', 'id' => 'editEquipment']) !!}
					@endif

							@include('equipment.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection