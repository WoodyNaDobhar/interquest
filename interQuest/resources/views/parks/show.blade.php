@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			The {!! $park->rank !!} of {!! $park->name !!}
			<a href="{!! route('parks.index') !!}" class="btn btn-default pull-right">Back</a>
		</h1>
	</section>
	<div class="content">
		@include('parks.show_fields')
	</div>
@endsection
