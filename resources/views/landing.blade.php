@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<section class="content-header">
			<h1 class="pull-left">Welcome{!! Auth::check() ? ', ' . (Auth::user()->persona ? Auth::user()->persona->name : Auth::user()->name) : '' !!}!</h1>
		</section>
		<div class="content">
			<div class="clearfix"></div>
	
			@include('flash::message')
	
			<div class="clearfix"></div>
				
			<div class="row">
				<div class="col-md-12">
					<div class="box box-primary">
						<div class="box-header">
							<h3 class="box-title"></h3>
							
							<div class="row">
								<div class="col-md-12">
									<div class="box-tools pull-right">
										<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
										</button>
										<div class="btn-group">
											<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
												<i class="fa fa-wrench"></i>
											</button>
											<ul class="dropdown-menu" role="menu">
												@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
												<li><a href="#" class="#">#</a></li>
												@endif
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box-body">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-5">
										@include('personae.table')
									</div>
									<div class="col-md-7">
										<div id="mapContainer" data-center="{!! Auth::user()->persona ? Auth::user()->persona->park->territory_id : 848 !!}" data-columns="10" data-rows="10"></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="text-center">
			
			</div>
		</div>
	</div>
</div>
@endsection
