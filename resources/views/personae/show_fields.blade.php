		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">{!! $persona->metatype->name !!} {!! $persona->vocation->name !!}{!! $persona->shattered ? ', in repose since: ' . $persona->shattered : '' !!}</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper || $persona->user_id == Auth::user()->id))
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									@if(Auth::user()->is_admin)
									<li><a href="/users/{!! $persona->user_id !!}/edit">Update User</a></li>
									@endif
									@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
									<li><a href="#" class="makeMapkeeper">{!! $persona->user && $persona->user->is_mapkeeper ? 'Make' : 'Revoke' !!} Mapkeeper</a></li>
									@endif
									<li><a href="/personae/{!! $persona->id !!}/edit">Edit Persona Details</a></li>
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
									@if($persona->user && $persona->user->social->provider_user_id)
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
												<img class="personaImage" src="{!! $persona->likeness !!}">
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
									<div class="personaImageContainerWrap">
										<div class="personaImageContainer">
											<img class="personaImage" src="{!! $persona->likeness !!}">
											<div class="personaImageContents">
												@if($persona->is_knight)
												<img class="overlayKnight" src="/img/overlay{!! $persona->vocation->id == 4 ? 'Paladin' : ($persona->vocation->id == 5 ? 'AntiPaladin' : 'SudoPaladin') !!}.png">
												@endif
												@if($persona->is_monarch)
												<img class="overlayMonarch" src="/img/overlayMonarch.png">
												@endif
												@if($persona->user && $persona->user->is_mapkeeper)
												<img class="overlayMapkeeper" src="/img/overlayMapkeeper.png">
												@endif
												@if($persona->deceased)
												<img class="overlayDeceased" src="/img/overlayDeceased.png">
												@endif
											</div>
										</div>
									</div>
								@endif
								{!! $persona->background_public !!}
								@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper || $persona->user_id == Auth::user()->id))
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
						<h3 class="box-title">Home @if($persona->titles->count() > 0) and Fiefdoms - {!! $persona->fiefsCount !!} Fiefs of {!! $persona->fiefsAvailable !!} available @endif</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper))
							<div class="btn-group">
								<button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-wrench"></i></button>
								<ul class="dropdown-menu" role="menu">
									@if($persona->fiefsCount < $persona->fiefsAvailable)
									<li><a href="/fiefs/create">Add Fief</a></li>
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
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseHome" aria-expanded="false" class="collapsed showFiefdom" data-center="{!! $persona->territory_id !!}" data-zoom="{!! $persona->home->fief ? $persona->home->fief->fiefdom->zoom : 1 !!}">
													Home
												</a>
											</h4>
										</div>
										<div id="collapseHome" class="panel-collapse collapse in" aria-expanded="false">
											<div class="box-body">
												<h3>{!! $persona->home ? $persona->home->displayname : 'Homeless! ' !!}</h3>
											</div>
										</div>
									</div>
								@foreach($persona->fiefdoms as $i => $fiefdom)
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapse{!! $i !!}" aria-expanded="false" class="collapsed showFiefdom" data-center="{!! $fiefdom->capital ? $fiefdom->capital->territory_id : $persona->park->territory_id !!}" data-zoom="{!! $fiefdom->zoom !!}">
													{!! $fiefdom->name !!} ({!! $fiefdom->fiefs ? $fiefdom->fiefs->count() : 'No Fiefs' !!})
												</a>
											</h4>
										</div>
										<div id="collapse{!! $i !!}" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="box-body">
											@if($fiefdom->fiefs)
												@foreach($fiefdom->fiefs as $i => $fief)
												<h3>{!! $fief->name ? $fief->name : 'Territory ' . ($i + 1) !!} <i class="fa fa-eye showFief pull-right" data-center="{!! $fief->territory_id !!}"></i></h3>
												@endforeach
											@endif
											</div>
										</div>
									</div>
								@endforeach
								</div>
							</div>
							<div class="col-md-7">
								<div id="mapContainer" data-center="{!! 
								$persona->territory_id ? 
									$persona->territory_id : 
									$persona->park->territory_id !!}" data-column="" data-row="" data-zoom="{!! 
								$persona->territory_id ? 
									$persona->home->fief->fiefdom->zoom : 
									$persona->park->zoom !!}"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper || $persona->user_id == Auth::user()->id))
		<div class="row">
			<div class="col-md-12">
				<div class="box box-primary">
					<div class="box-header">
						<h3 class="box-title">Details</h3>
						<div class="box-tools pull-right">
							<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
							</button>
							@if(!Auth::guest() && (Auth::user()->is_admin || Auth::user()->is_mapkeeper))
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
							<div class="col-md-6">
								<div class="box-group" id="accordion">
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseActions" aria-expanded="false" class="collapsed">
													Actions 
												</a>
											</h4>
											<div class="box-tools">
												Default: 
												<select class="" id="defaultActionSelect">
													@foreach($actions as $action)
													<option value="{!! $action->id !!}"{!! $action->id == $persona->action_id ? ' selected' : '' !!}>{!! $action->name !!}</option>
													@endforeach
												</select>
											</div>
										</div>
										<div id="collapseActions" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="box-body">
											@if($persona->actions)
												<ul class="timeline">
												@foreach($persona->actions as $ia => $action)
													<li class="time-label">
														<span class="bg-purple">
														{!! substr($action->created_at, 0, -9) !!}
														</span>
													</li>
													<li>
														<i class="fa fa-{!! $action->action->icon !!} bg-{!! $action->action->check_required ? ($action->result != null ? ($action->result ? 'green' : 'red') : 'yellow') : 'blue' !!}"></i>
														<div class="timeline-item">
															<h3 class="timeline-header">{!! $action->action->name !!}</h3>
															<div class="timeline-body">
																<b>From:</b> {!! $action->source->name !!}<br>
																<b>To:</b> {!! $action->target->name !!}<br>
																@if($action->action->check_required)
																<b>Result:</b> {!! $action->result ? $action->result : 'untested' !!}<br>
																@endif
																@if($action->comments)
																<b>Comments:</b>
																<ul>
																@foreach($action->comments as $ic => $comment)
																	<li><em>{!! $comment->show_mapkeepers ? 'Private' : 'Public' !!}:</em> {!! $comment->message !!}</li>
																@endforeach
																</ul>
																@endif
															</div>
														</div>
													</li>
												@endforeach
												</ul>
											@endif
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box-group" id="accordion">
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#collapseResources" aria-expanded="false" class="collapsed">
													Resources and Equipment
												</a>
											</h4>
										</div>
										<div id="collapseResources" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
											<div class="box-body">
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">Gold</h3>
							
														<div class="box-tools">
															Total: {!! $persona->gold->total !!}
														</div>
													</div>
													<div class="box-body no-padding">
														<table class="table">
															<tbody><tr>
																<th>Territory Held</th>
																<th style="width: 10px;">Vault</th>
																<th style="width: 10px;">Amt</th>
															</tr>
															<tr>
																<td>On Persona</td>
																<td>{!! $persona->gold->persona->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $persona->gold->persona->total !!}</td>
															</tr>
															@foreach($persona->gold->locations as $location)
															<tr>
																<td>{!! $location->name !!}</td>
																<td>{!! $location->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $location->total !!}</td>
															</tr>
															@endforeach
														</tbody></table>
													</div>
													<!-- /.box-body -->
												</div>
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">Iron</h3>
							
														<div class="box-tools">
															Total: {!! $persona->iron->total !!}
														</div>
													</div>
													<div class="box-body no-padding">
														<table class="table">
															<tbody><tr>
																<th>Territory Held</th>
																<th style="width: 10px;">Vault</th>
																<th style="width: 10px;">Amt</th>
															</tr>
															<tr>
																<td>On Persona</td>
																<td>{!! $persona->iron->persona->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $persona->iron->persona->total !!}</td>
															</tr>
															@foreach($persona->iron->locations as $location)
															<tr>
																<td>{!! $location->name !!}</td>
																<td>{!! $location->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $location->total !!}</td>
															</tr>
															@endforeach
														</tbody></table>
													</div>
													<!-- /.box-body -->
												</div>
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">Timber</h3>
							
														<div class="box-tools">
															Total: {!! $persona->timber->total !!}
														</div>
													</div>
													<div class="box-body no-padding">
														<table class="table">
															<tbody><tr>
																<th>Territory Held</th>
																<th style="width: 10px;">Vault</th>
																<th style="width: 10px;">Amt</th>
															</tr>
															<tr>
																<td>On Persona</td>
																<td>{!! $persona->timber->persona->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $persona->timber->persona->total !!}</td>
															</tr>
															@foreach($persona->timber->locations as $location)
															<tr>
																<td>{!! $location->name !!}</td>
																<td>{!! $location->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $location->total !!}</td>
															</tr>
															@endforeach
														</tbody></table>
													</div>
													<!-- /.box-body -->
												</div>
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">Stone</h3>
							
														<div class="box-tools">
															Total: {!! $persona->stone->total !!}
														</div>
													</div>
													<div class="box-body no-padding">
														<table class="table">
															<tbody><tr>
																<th>Territory Held</th>
																<th style="width: 10px;">Vault</th>
																<th style="width: 10px;">Amt</th>
															</tr>
															<tr>
																<td>On Persona</td>
																<td>{!! $persona->stone->persona->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $persona->stone->persona->total !!}</td>
															</tr>
															@foreach($persona->stone->locations as $location)
															<tr>
																<td>{!! $location->name !!}</td>
																<td>{!! $location->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $location->total !!}</td>
															</tr>
															@endforeach
														</tbody></table>
													</div>
													<!-- /.box-body -->
												</div>
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">Grain</h3>
							
														<div class="box-tools">
															Total: {!! $persona->grain->total !!}
														</div>
													</div>
													<div class="box-body no-padding">
														<table class="table">
															<tbody><tr>
																<th>Territory Held</th>
																<th style="width: 10px;">Vault</th>
																<th style="width: 10px;">Amt</th>
															</tr>
															<tr>
																<td>On Persona</td>
																<td>{!! $persona->grain->persona->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $persona->grain->persona->total !!}</td>
															</tr>
															@foreach($persona->grain->locations as $location)
															<tr>
																<td>{!! $location->name !!}</td>
																<td>{!! $location->vaulted == 1 ? 'Yes' : 'No' !!}</td>
																<td>{!! $location->total !!}</td>
															</tr>
															@endforeach
														</tbody></table>
													</div>
													<!-- /.box-body -->
												</div>
												<div class="box">
													<div class="box-header">
														<h3 class="box-title">Equipment</h3>
													</div>
													<div class="box-body no-padding">
														<table class="table">
															<tbody><tr>
																<th>Type</th>
																<th>Territory Held</th>
																<th style="width: 10px">Vault</th>
																<th class="pull-right">Comments</th>
															</tr>
															@foreach($persona->equipment as $equipment)
															<tr>
																<td>{!! $equipment->name !!}</td>
																<td>{!! $equipment->territory_id != null ? $equipment->territory->displayname : 'On Persona' !!}</td>
																<td>{!! $equipment->territory_id != null ? ($equipment->territory->vaulted == 1 ? 'Yes' : 'No') : 'No' !!}</td>
																<td class="pull-right">
																	<div class="btn-group">
																		@if($equipment->comments && count($equipment->comments) > 0)
																		@foreach($equipment->comments as $comment)
																		<button type="button" class="btn btn-default showComment" data-comment_id="{!! $comment->id !!}" data-toggle="tooltip" title="{!! $comment->subject !!}"><i class="fa fa-comment"></i></button>
																		@endforeach
																		@endif
																		<button type="button" class="btn btn-default addComment" data-commented_id="1" data-commented_type="Equipment" data-toggle="tooltip" title="Add Comment"><i class="fa fa-plus"></i></button>
																	</div>
																</td>
															</tr>
															@endforeach
														</tbody></table>
													</div>
													<!-- /.box-body -->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
@endif
@section('scripts')
	@parent
	<script src="/js/custom_persona.js"></script>
@endsection