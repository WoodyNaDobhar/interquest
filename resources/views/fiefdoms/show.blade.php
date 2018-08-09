@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1>
			{!! $fiefdom->name !!}
			<a href="{!! route('fiefdoms.index') !!}" class="btn btn-default pull-right">Back</a>
		</h1>
	</section>
	<div class="content">
		@include('fiefdoms.show_fields')
	</div>
@endsection
