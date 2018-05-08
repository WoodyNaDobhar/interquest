@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
	    <section class="content-header">
	        <h1 class="pull-left">Welcome!</h1>
	    </section>
	    <div class="content">
	        <div class="clearfix"></div>
	
	        @include('flash::message')
	
	        <div class="clearfix"></div>
	        <div class="box box-primary">
	            <div class="box-body">
	                    This is a splash page.
	            </div>
	        </div>
	        <div class="text-center">
	        
	        </div>
	    </div>
    </div>
</div>
@endsection
