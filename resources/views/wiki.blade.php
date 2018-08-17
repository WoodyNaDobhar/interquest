@extends('layouts.app')

@section('content')
	<section class="content-header">
		<h1 class="pull-left">{!! $pageId !!}</h1>
	</section>
    <div class="content">
        <div class="clearfix"></div>
        <div class="clearfix"></div>
        <div class="box box-primary">
			{!! $wikontent !!}
		</div>
	</div>
@endsection
