@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			User
		</h1>
	</section>
	<div class="content">
		@include('adminlte-templates::common.errors')
		<div class="box box-primary">

			<div class="box-body">
				<div class="row">
				@if(Request::segment(1) != 'sparse')
					{!! Form::open(['route' => 'users.store', 'id' => 'createUser']) !!}
				@else
					{!! Form::open(['route' => 'api.v1.users.store', 'id' => 'createUser']) !!}
				@endif

						@include('users.fields')

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
@endsection
