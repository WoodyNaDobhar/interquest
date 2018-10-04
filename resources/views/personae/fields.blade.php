@if(!isset($persona) || $persona->validClaim != 'claimed')

<!-- Email Field -->
<div class="form-group col-sm-6">
	{!! Form::label('validClaim', 'User Facebook Email:') !!}
	{!! Form::text('validClaim', isset($persona) ? $persona->validClaim : (Auth::user()->persona == null ? Auth::user()->email : old('validClaim')), ['class' => 'form-control']) !!}
</div>

@if(!isset($persona))

<!-- Email Instructions Field -->
<div class="form-group col-sm-6">
	If you know, or can get, the email address the Persona's user signed up to Facebook with, we can verify them later and let them take control over some of their more superficial details (name, background, image, etc).  You can invite them later with a convenient button when you get that email address from them.  Not required.
</div>

@elseif(Auth::user()->is_admin || Auth::user()->is_mapkeeper)

<!-- Invite Field -->
<div class="form-group col-sm-6">
	<a class="btn btn-primary pull-right invitePersona" data-persona_id="{!!$persona->id!!}">Send Claim Invite</a>
</div>

@else

<!-- filler -->
<div class="form-group col-sm-12">
	&nbsp;
</div>

@endif

@endif

<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Common Name:') !!}
	{!! Form::text('name', isset($persona) ? $persona->name : old('name'), ['class' => 'form-control']) !!}
</div>

@if(!isset($suppressSave) || $suppressSave === false)

<!-- Long Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('long_name', 'Long Name:') !!}
	{!! Form::text('long_name', isset($persona) ? $persona->long_name : old('long_name'), ['class' => 'form-control']) !!}
</div>

@endif

<!-- Orkid Field -->
<div class="form-group col-sm-6">
	{!! Form::label('orkID', 'Persona ORK Id:') !!}
	{!! Form::text(( (!isset($suppressSave) || $suppressSave === false) ? 'orkID' : 'personaOrkID'), ((!isset($suppressSave) || $suppressSave === false) ? (isset($persona) ? $persona->orkID : old('orkID')) : old('personaOrkID')), ['class' => 'form-control', 'placeholder' => 'https://amtgard.com/ork/orkui/?Route=Player/index/XXXX <- this last number', (Auth::user()->is_admin || Auth::user()->is_mapkeeper || Auth::user()->persona == null) ? '' : 'disabled' => 'disabled']) !!}
</div>

@if(!isset($suppressSave) || $suppressSave === false)

<!-- Metatype Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('metatype_id', 'Metatype:') !!}
	{!! Form::select('metatype_id', $metatypes, isset($persona) ? $persona->metatype_id : old('metatype_id'), ['class' => 'form-control']) !!}
</div>

<!-- Vocation Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('vocation_id', 'Declared Class:') !!}
	{!! Form::select('vocation_id', $vocations, isset($persona) ? $persona->vocation_id : old('vocation_id'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper || Auth::user()->persona == null) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
	{!! Form::label('image', 'Image:') !!}
	{!! Form::select('image', [
			'' => 'None',
			'file' => 'Uploaded Image',
			'facebook' => 'Facebook Image',
			'ork' => 'ORK Image'
		],
		isset($persona) ? $persona->image : old('image'), 
		[
			'class' => 'form-control personaImageFile'
		]) 
	!!}
	<input id="imageFile" name="image"{!! isset($persona) && $persona->image == 'file' ? '' : ' disabled="disabled"' !!} type="file" class="typeTarget uploadFile" style="{!! isset($persona) && $persona->image == 'file' ? '' : 'display: none;' !!}">
</div>

<!-- Background Public Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('background_public', 'Publicly Known Background:') !!}
	{!! Form::textarea('background_public', isset($persona) ? $persona->background_public : old('background_public'), ['class' => 'form-control']) !!}
</div>

<!-- Background Private Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('background_private', 'Private Background Details:') !!}
	{!! Form::textarea('background_private', isset($persona) ? $persona->background_private : old('background_private'), ['class' => 'form-control']) !!}
</div>

<!-- Park Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('park_id', 'Home Park:') !!}
	{!! Form::select('park_id', $parks, isset($persona) ? $persona->park_id : (Auth::user()->is_mapkeeper ? (Auth::user()->persona ? Auth::user()->persona->park_id : old('park_id')) : old('park_id')), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper || Auth::user()->persona == null) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Action Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('action_id', 'Default Action:') !!}
	{!! Form::select('action_id', $actions, isset($persona) ? $persona->action_id : (old('action_id') != '' ? old('action_id') : 19), ['class' => 'form-control']) !!}
</div>

@if(Auth::user()->persona != null)
	
<!-- Territory Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('territory_id', 'Home Territory:') !!}
	{!! Form::select('territory_id', ['' => 'Homeless'] + $territories, isset($persona) ? $persona->territory_id : (old('territory_id') != '' ? old('territory_id') : (Auth::user()->persona ? Auth::user()->persona->park->capital->id : '')), ['class' => 'form-control']) !!}
</div>

<!-- Titles Field -->
<div class="form-group col-sm-6">
	{!! Form::label('titles', 'Titles:') !!}
	{!! Form::select('titles[]', $titles, (isset($persona) ? $persona->titles->pluck('id')->toArray() : old('titles[]')), ['class' => 'form-control', 'multiple' => 'multiple', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Gold Field -->
<div class="form-group col-sm-6">
	{!! Form::label('gold', 'Gold On Persona:') !!}
	{!! Form::number('gold', isset($persona) ? $persona->gold->persona->total : old('gold'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Iron Field -->
<div class="form-group col-sm-6">
	{!! Form::label('iron', 'Iron On Persona:') !!}
	{!! Form::number('iron', isset($persona) ? $persona->iron->persona->total : old('iron'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Timber Field -->
<div class="form-group col-sm-6">
	{!! Form::label('timber', 'Timber On Persona:') !!}
	{!! Form::number('timber', isset($persona) ? $persona->timber->persona->total : old('timber'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Stone Field -->
<div class="form-group col-sm-6">
	{!! Form::label('stone', 'Stone On Persona:') !!}
	{!! Form::number('stone', isset($persona) ? $persona->stone->persona->total : old('stone'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Grain Field -->
<div class="form-group col-sm-6">
	{!! Form::label('grain', 'Grain On Persona:') !!}
	{!! Form::number('grain', isset($persona) ? $persona->grain->persona->total : old('grain'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Fiefs Assigned Field -->
<div class="form-group col-sm-6">
	{!! Form::label('fiefs_assigned', 'Fiefs Assigned:') !!}
	{!! Form::number('fiefs_assigned', isset($persona) ? $persona->fiefs_assigned : old('fiefs_assigned'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Is Knight Field -->
@if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
<div class="form-group col-sm-offset-1 col-sm-4">
	{!! Form::label('is_knight', 'Is Knight:') !!}
	<label>
		{!! Form::checkbox('is_knight', '1', isset($persona) ? ($persona->is_knight == 1 ? ['checked' => 'checked'] : null) : (old('is_knight') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Is Rebel Field -->
<div class="form-group col-sm-4">
	{!! Form::label('is_rebel', 'Is Rebel:') !!}
	<label>
		{!! Form::checkbox('is_rebel', '1', isset($persona) ? ($persona->is_rebel == 1 ? ['checked' => 'checked'] : null) : (old('is_rebel') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>
@endif

<!-- Shattered Field -->
<div class="form-group col-sm-6">
	{!! Form::label('shattered', 'Shattered:') !!}
	{!! Form::date('shattered', isset($persona) ? $persona->shattered : old('shattered'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Deceased Field -->
<div class="form-group col-sm-6">
	{!! Form::label('deceased', 'Deceased:') !!}
	{!! Form::date('deceased', isset($persona) ? $persona->deceased : old('deceased'), ['class' => 'form-control']) !!}
</div>

@endif

@endif

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('personae.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
