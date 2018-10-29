@section('css')
    @include('layouts.datatables_css')
@endsection
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">About {!! $park->name !!}</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper))
									<li><a href="#" class="setMapkeeper" data-parkID="{!! $park->id !!}">Switch Mapkeeper</a></li>
									<li><a href="/parks/{!! $park->id !!}/edit">Edit Settlement</a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-5">
									<div class="col-md-5">
										<a href="https://amtgard.com/ork/orkui/?Route=Park/index/{!! $park->orkID !!}">
											<img src="{!! @getimagesize('https://amtgard.com/ork/assets/heraldry/park/' . sprintf('%05d', $park->orkID) . '.jpg') ? 'https://amtgard.com/ork/assets/heraldry/park/' . sprintf('%05d', $park->orkID) . '.jpg' : '' !!}" alt="{!! $park->name !!} Heraldry" width="100%">
										</a>
									</div>
									<div class="col-md-7">
										<b>Population: </b>{!! $park->personae ? $park->personae->count() : '0' !!}<br>
										<b>Monarch: </b>{!! $park->ruler ? $park->ruler->name : 'None!' !!}<br>
										<b>Mapkeeper: </b>{!! $park->mapkeeper ? $park->mapkeeper->name : 'None!' !!}<br>
										<b>Midreign: </b>{!! $park->midreign !!}<br>
										<b>Coronation: </b>{!! $park->coronation !!}<br><br>
										@if($park->orkID)
										<a href="https://amtgard.com/ork/orkui/?Route=Park/index/{!! $park->orkID !!}" target="_blank">
											<img src="/img/linkORK.png" width="50" height="50" alt="Online Record Keeper">
										</a>
										@endif
									</div>
								</div>
								<div class="col-md-7">
									<div id="mapContainer" data-center="{!! $park->territory_id !!}" data-column="{!! $park->capital->column !!}" data-row="{!! $park->capital->row !!}" data-zoom="{!! $park->zoom !!}"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{!! $park->personae ? $park->personae->count() : '0' !!} Notable Citizens</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper))
									@endif
								</ul>
							</div>
						</div>
					</div>
					<div class="box-body" id="relatedPersonae">
						@include('personae.table')
					</div>
				</div>
			</div>
		</div>
@section('scripts')
	@parent
    @include('layouts.datatables_js')
	<script src="/js/custom_park.js"></script>
@endsection