@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			Metatype
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">

			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => 'metatypes.store', 'id' => 'createMetatype']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.metatypes.store', 'id' => 'createMetatype']) !!}
				@endif

						@include('metatypes.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
