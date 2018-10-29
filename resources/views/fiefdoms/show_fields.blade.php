		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">About {!! $fiefdom->name !!}</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
									<li><a href="/fiefdoms/{!! $fiefdom->id !!}/edit">Edit Fiefdom</a></li>
									@endif
								</ul>
							</div>
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="col-md-4">
									<img src="{!! $fiefdom->likeness != '' ? $fiefdom->likeness : '/img/phoenixShield.jpg' !!}" alt="{!! $fiefdom->name !!} Heraldry" width="100%"><br><br>
									<b>Population: </b>{!! $fiefdom->population !!}<br>
									<b>Ruler: </b>{!! $fiefdom->ruler->name !!}<br>
									<b>Mapkeeper: </b>{!! $fiefdom->ruler->park->mapkeeper->name !!}
								</div>
								<div class="col-md-8">
									<div id="mapContainer" data-center="{!! $fiefdom->capital->territory->id !!}" data-column="{!! $fiefdom->capital->territory->column !!}" data-row="{!! $fiefdom->capital->territory->row !!}" data-zoom="{!! $fiefdom->zoom !!}"></div>
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
						<h3 class="box-title">{!! $fiefdom->population !!} Notable Citizens</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i>
								</button>
								<ul class="dropdown-menu" role="menu">
									@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
									@endif
								</ul>
							</div>
						</div>
					</div>
					<div class="box-body" id="relatedPersonae">
						<table class="table table-bordered table-condensed" id="relatedPersonaeTable" data-fiefdomID="{!! $fiefdom->id !!}">
							<thead>
								<tr>
									<th>Name</th>
									<th>Image</th>
									<th>Title</th>
									<th>Vocation</th>
									<th>Metatype</th>
									<th>Rebel?</th>
								</tr>
							</thead>
						</table>
					</div>
				</div>
			</div>
		</div>