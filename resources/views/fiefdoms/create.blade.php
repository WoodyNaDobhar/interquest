@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Fiefdom
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">

			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => 'fiefdoms.store', 'id' => 'createFiefdom', 'files' => true]) !!}
				@else
					{!! Form::open(['route' => 'api.v1.fiefdoms.store', 'id' => 'createFiefdom', 'files' => true]) !!}
				@endif

						@include('fiefdoms.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
