		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{!! $persona->race->name !!} {!! $persona->vocation->name !!}{!! $persona->shattered ? ', in repose since: ' . $persona->shattered : '' !!}</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper || $persona->user_id == Auth::user()->id)
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									@if(Auth::user()->is_admin)
									<li><a href="/users/{!! $persona->user_id !!}/edit">Update User</a></li>
									@endif
									@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
									<li><a href="#" class="mkToggle">{!! $persona->user->is_mapkeeper ? 'Make' : 'Revoke' !!} Mapkeeper</a></li>
									@endif
									<li><a href="/personas/{!! $persona->id !!}/edit">Edit Persona Details</a></li>
								</ul>
							</div>
							@endif
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-12">
								<div class="personaLinks">
									@if($persona->orkID)
									<a href="https://amtgard.com/ork/orkui/?Route=Player/index/{!! $persona->orkID !!}" target="_blank">
										<img src="/img/linkORK.png" width="50" height="50" alt="Online Record Keeper">
									</a>
									@endif
									@if($persona->user->social->provider_user_id)
									<a href="http://www.facebook.com/{!! $persona->user->social->provider_user_id !!}}" target="_blank">
										<img src="/img/linkFacebook.png" width="50" height="50" alt="Facebook">
									</a>
									@endif
									@if($persona->park)
									<a href="https://amtgard.com/ork/orkui/?Route=Park/index/{!! $persona->park->orkID !!}" target="_blank">
										<img src="{!! is_array(getimagesize('https://amtgard.com/ork/assets/heraldry/park/' . sprintf('%05d', $persona->park->orkID) . '.jpg')) ? 'https://amtgard.com/ork/assets/heraldry/park/' . sprintf('%05d', $persona->park->orkID) . '.jpg' : 'asdf' !!}" width="50" alt="{!! $persona->park->name !!}">
									</a>
									@endif
								</div>
								@if($persona->is_rebel)
									<div class="rebelContainerWrap">
										<div class="rebelContainer">
											<img class="underlayRebel" src="/img/underlayRebel.png">
											<div class="rebelContents">
												<img class="personaImage" src="{!! $persona->image !!}">
												@if($persona->is_knight)
												<img class="overlayKnight" src="/img/overlay{!! $persona->vocation->id == 4 ? 'Paladin' : ($persona->vocation->id == 5 ? 'AntiPaladin' : 'SudoPaladin') !!}.png">
												@endif
												@if($persona->is_monarch)
												<img class="overlayMonarch" src="/img/overlayMonarch.png">
												@endif
												@if($persona->user->is_mapkeeper)
												<img class="overlayMapkeeper" src="/img/overlayMapkeeper.png">
												@endif
												@if($persona->deceased)
												<img class="overlayDeceased" src="/img/overlayDeceased.png">
												@endif
											</div>
										</div>
									</div>
								@else
									<img class="personaImage {!! $persona->is_rebel ? 'rebel' : '' !!}" src="{!! $persona->image !!}">
									@if($persona->is_knight)
									<img class="overlayKnight" src="/img/overlay{!! $persona->vocation->id == 4 ? 'Paladin' : ($persona->vocation->id == 5 ? 'AntiPaladin' : 'SudoPaladin') !!}.png">
									@endif
									@if($persona->is_monarch)
									<img class="overlayMonarch" src="/img/overlayMonarch.png">
									@endif
									@if($persona->user->is_mapkeeper)
									<img class="overlayMapkeeper" src="/img/overlayMapkeeper.png">
									@endif
									@if($persona->deceased)
									<img class="overlayDeceased" src="/img/overlayDeceased.png">
									@endif
								@endif
								{!! $persona->background_public !!}
								@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper || $persona->user_id == Auth::user()->id)
								<h4>{!! $persona->name !!}'s Secrets</h4>{!! $persona->background_private !!}
								@endif
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
						<h3 class="box-title">Home @if($persona->titles->count() > 0) and Fiefdoms - {!! $persona->fievesRuling->count() !!} Fiefs of {!! $persona->fievesAvailable !!} available @endif</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									@if($persona->fievesRuling->count() < $persona->fievesAvailable)
									<li><a href="/fieves/create">Add Fief</a></li>
									@endif
								</ul>
							</div>
							@endif
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-5">
								<div class="box-group" id="accordion">
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseHome" aria-expanded="false" class="collapsed showFiefdom" data-center="{!! $persona->territory_id !!}">
													Home
												</a>
											</h4>
										</div>
										<div id="collapseHome" class="panel-collapse collapse in" aria-expanded="false">
											<div class="box-body">
												<h3>{!! $persona->home ? $persona->home->name : 'Homeless! ' !!}</h3>
											</div>
										</div>
									</div>
								@foreach($persona->fiefdoms as $i => $fiefdom)
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $i !!}" aria-expanded="false" class="collapsed showFiefdom" data-center="{!! $fiefdom->capitol ? $fiefdom->capitol->territory_id : $persona->park->territory_id !!}">
													{!! $fiefdom->name !!} ({!! $fiefdom->fiefs ? $fiefdom->fiefs->count() : 'No Fiefs' !!})
												</a>
											</h4>
										</div>
										<div id="collapse{!! $i !!}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="box-body">
											@if($fiefdom->fiefs)
												@foreach($fiefdom->fiefs as $i => $fief)
												<h3>{!! $fief->name ? $fief->name : 'Territory ' . ($i + 1) !!} <i class="fa fa-trash deleteMe pull-right" data-model="fief" data-id="{!! $fief->id !!}"></i><i class="fa fa-eye mapZoom pull-right" data-center="{!! $fiefdom->capitol->id !!}" data-zoom="{!! $fiefdom->zoom !!}"></i></h3>
												@endforeach
											@endif
											</div>
										</div>
									</div>
								@endforeach
								</div>
				fiefdom name ((fief count)) (5 cols)(click shows on map & opens fief list)
					fieves (hover highlights on map)
							</div>
							<div class="col-md-7">
								<div id="mapContainer" data-center="{!! $persona->territory_id ? $persona->territory_id : $persona->park->territory_id !!}" data-columns="10" data-rows="10"></div>
								map div (territory controls on hover)
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper || $persona->user_id == Auth::user()->id)
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Details</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									asdf
								</ul>
							</div>
							@endif
						</div>
					</div>
					<div class="box-body">
						<div class="row">
							<div class="col-md-5">
								<div class="box-group" id="accordion">
								@foreach($persona->fiefdoms as $i => $fiefdom)
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $i !!}" aria-expanded="false" class="collapsed showFiefdom" data-center="{!! $fiefdom->capitol ? $fiefdom->capitol->territory_id : $persona->park->territory_id !!}">
													{!! $fiefdom->name !!} ({!! $fiefdom->fiefs ? $fiefdom->fiefs->count() : 'No Fiefs' !!})
												</a>
											</h4>
										</div>
										<div id="collapse{!! $i !!}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="box-body">
											@if($fiefdom->fiefs)
												@foreach($fiefdom->fiefs as $i => $fief)
												<h3>{!! $fief->name ? $fief->name : 'Territory ' . ($i + 1) !!} <i class="fa fa-trash deleteMe pull-right" data-model="fief" data-id="{!! $fief->id !!}"></i><i class="fa fa-eye mapZoom pull-right" data-center="{!! $fiefdom->capitol->id !!}" data-zoom="{!! $fiefdom->zoom !!}"></i></h3>
												@endforeach
											@endif
											</div>
										</div>
									</div>
								@endforeach
								</div>
				fiefdom name ((fief count)) (5 cols)(click shows on map & opens fief list)
					fieves (hover highlights on map)
							</div>
							<div class="col-md-7">
								<div id="mapContainer" data-center="{!! $persona->park->territory_id !!}" data-columns="10" data-rows="10"></div>
								map div (territory controls on hover)
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	
@endif
(MK+/Self)Dailies
	
	Default Action: actionDefault
	Actions
		(date select) (display action by selected date)
	Banked Resources
		(one row, total<br>icon)
		Gold
		Iron
		Timber
		Stone
		Grain
	Equipment
		(x rows, count<br>icon)
	Created: created_at (4col) (MK+) Updated: updated_at (4col) (+) Deleted: deleted_at (4col)
Comments
	Add Comment (plus sign, right side)
	comments (!show_mapkeepers ? self, + : self, mk+)

@section('scripts')
	@parent
    <script src="/js/custom_profile.js"></script>
@endsection