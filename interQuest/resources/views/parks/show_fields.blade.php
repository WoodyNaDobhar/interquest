		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{!! $park->rank !!} ({!! $park->personae ? $park->personae->count() : '0' !!} Citizens)</h3>
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

								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
								
<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $park->id !!}</p>
</div>

<!-- Orkid Field -->
<div class="form-group">
    {!! Form::label('orkID', 'Orkid:') !!}
    <p>{!! $park->orkID !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $park->name !!}</p>
</div>

<!-- Rank Field -->
<div class="form-group">
    {!! Form::label('rank', 'Rank:') !!}
    <p>{!! $park->rank !!}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('row', 'Map Row:') !!}
    {!! $park->row !!}
</div>

<!-- Lon Field -->
<div class="form-group">
    {!! Form::label('column', 'Map Row:') !!}
    {!! $park->column !!}
</div>

<!-- Midreign Field -->
<div class="form-group">
    {!! Form::label('midreign', 'Midreign:') !!}
    <p>{!! $park->midreign !!}</p>
</div>

<!-- Coronation Field -->
<div class="form-group">
    {!! Form::label('coronation', 'Coronation:') !!}
    <p>{!! $park->coronation !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $park->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $park->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $park->deleted_at !!}</p>
</div>

