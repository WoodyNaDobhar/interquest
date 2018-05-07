		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{!! $persona->race->name !!} {!! $persona->vocation->name !!}{!! $persona->shattered ? ', in repose since: ' . $persona->shattered : '' !!}</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if($persona->user->is_admin || $persona->user->is_mapkeeper || $persona->user_id == Auth::user()->id)
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									@if($persona->user->is_admin)
									<li><a href="/users/{!! $persona->user_id !!}/edit">User {!! $persona->user_id !!}</a></li>
									@endif
									@if($persona->user->is_admin || $persona->user->is_mapkeeper)
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
									<a href="https://amtgard.com/ork/orkui/?Route=Player/index/{!! $persona->orkID !!}">
										<img src="/img/linkORK.png" width="50" height="50" alt="Online Record Keeper">
									</a>
									@endif
									@if($persona->user->social->provider_user_id)
									<a href="http://www.facebook.com/{!! $persona->user->social->provider_user_id !!}}">
										<img src="/img/linkFacebook.png" width="50" height="50" alt="Facebook">
									</a>
									@endif
									@if($persona->park)
									<a href="https://amtgard.com/ork/orkui/?Route=Park/index/{!! $persona->park->orkID !!}">
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
								@if($persona->user->is_admin || $persona->user->is_mapkeeper || $persona->user_id == Auth::user()->id)
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
							@if($persona->user->is_admin || $persona->user->is_mapkeeper)
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
@if($persona->user->is_admin || $persona->user->is_mapkeeper || $persona->user_id == Auth::user()->id)
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Details</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if($persona->user->is_admin || $persona->user->is_mapkeeper)
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







<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $persona->id !!}</p>
</div>

<!-- Orkid Field -->
<div class="form-group">
    {!! Form::label('orkID', 'Orkid:') !!}
    <p>{!! $persona->orkID !!}</p>
</div>

<!-- User Id Field -->
<div class="form-group">
    {!! Form::label('user_id', 'User Id:') !!}
    <p>{!! $persona->user_id !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $persona->name !!}</p>
</div>

<!-- Long Name Field -->
<div class="form-group">
    {!! Form::label('long_name', 'Long Name:') !!}
    <p>{!! $persona->long_name !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <p>{!! $persona->image !!}</p>
</div>

<!-- Vocation Id Field -->
<div class="form-group">
    {!! Form::label('vocation_id', 'Vocation Id:') !!}
    <p>{!! $persona->vocation_id !!}</p>
</div>

<!-- Race Id Field -->
<div class="form-group">
    {!! Form::label('race_id', 'Race Id:') !!}
    <p>{!! $persona->race_id !!}</p>
</div>

<!-- Background Public Field -->
<div class="form-group">
    {!! Form::label('background_public', 'Background Public:') !!}
    <p>{!! $persona->background_public !!}</p>
</div>

<!-- Background Private Field -->
<div class="form-group">
    {!! Form::label('background_private', 'Background Private:') !!}
    <p>{!! $persona->background_private !!}</p>
</div>

<!-- Park Id Field -->
<div class="form-group">
    {!! Form::label('park_id', 'Park Id:') !!}
    <p>{!! $persona->park_id !!}</p>
</div>

<!-- Territory Id Field -->
<div class="form-group">
    {!! Form::label('territory_id', 'Territory Id:') !!}
    <p>{!! $persona->territory_id !!}</p>
</div>

<!-- Gold Field -->
<div class="form-group">
    {!! Form::label('gold', 'Gold:') !!}
    <p>{!! $persona->gold !!}</p>
</div>

<!-- Iron Field -->
<div class="form-group">
    {!! Form::label('iron', 'Iron:') !!}
    <p>{!! $persona->iron !!}</p>
</div>

<!-- Timber Field -->
<div class="form-group">
    {!! Form::label('timber', 'Timber:') !!}
    <p>{!! $persona->timber !!}</p>
</div>

<!-- Stone Field -->
<div class="form-group">
    {!! Form::label('stone', 'Stone:') !!}
    <p>{!! $persona->stone !!}</p>
</div>

<!-- Grain Field -->
<div class="form-group">
    {!! Form::label('grain', 'Grain:') !!}
    <p>{!! $persona->grain !!}</p>
</div>

<!-- Action Id Field -->
<div class="form-group">
    {!! Form::label('action_id', 'Action Id:') !!}
    <p>{!! $persona->action_id !!}</p>
</div>

<!-- Is Knight Field -->
<div class="form-group">
    {!! Form::label('is_knight', 'Is Knight:') !!}
    <p>{!! $persona->is_knight !!}</p>
</div>

<!-- Is Rebel Field -->
<div class="form-group">
    {!! Form::label('is_rebel', 'Is Rebel:') !!}
    <p>{!! $persona->is_rebel !!}</p>
</div>

<!-- Is Monarch Field -->
<div class="form-group">
    {!! Form::label('is_monarch', 'Is Monarch:') !!}
    <p>{!! $persona->is_monarch !!}</p>
</div>

<!-- Fiefs Assigned Field -->
<div class="form-group">
    {!! Form::label('fiefs_assigned', 'Fiefs Assigned:') !!}
    <p>{!! $persona->fiefs_assigned !!}</p>
</div>

<!-- Shattered Field -->
<div class="form-group">
    {!! Form::label('shattered', 'Shattered:') !!}
    <p>{!! $persona->shattered !!}</p>
</div>

<!-- Deceased Field -->
<div class="form-group">
    {!! Form::label('deceased', 'Deceased:') !!}
    <p>{!! $persona->deceased !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $persona->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $persona->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $persona->deleted_at !!}</p>
</div>

