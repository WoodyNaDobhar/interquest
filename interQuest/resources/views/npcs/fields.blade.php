<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Private Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('private_name', 'Private Name:') !!}
	{!! Form::text('private_name', old('private_name'), ['class' => 'form-control']) !!}
</div>

<!-- Vocation Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('vocation_id', 'Class:') !!}
	{!! Form::select('vocation_id', ['' => 'None'] + $vocations, old('vocation_id'), ['class' => 'form-control']) !!}
</div>

<!-- Metatype Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('metatype_id', 'Metatype:') !!}
	{!! Form::select('metatype_id', $metatypes, old('metatype_id'), ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
	{!! Form::label('image', 'Image:') !!}
	{!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Public Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('background_public', 'Background Public:') !!}
	{!! Form::textarea('background_public', old('background_public'), ['class' => 'form-control']) !!}
</div>

<!-- Background Private Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('background_private', 'Background Private:') !!}
	{!! Form::textarea('background_private', old('background_private'), ['class' => 'form-control']) !!}
</div>

<!-- Park Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('park_id', 'MapKeeper\'s Park:') !!}
	{!! Form::select('park_id', $parks, (old('park_id') !== null ? old('park_id') : $park->id), ['class' => 'form-control']) !!}
</div>

<!-- Territory Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('territory_id', 'Home Territory:') !!}
	{!! Form::select('territory_id', ['' => 'Homeless'] + $territories, old('territory_id'), ['class' => 'form-control']) !!}
</div>

<!-- Gold Field -->
<div class="form-group col-sm-6">
	{!! Form::label('gold', 'Gold On Hand:') !!}
	{!! Form::number('gold', isset($npc) ? $npc->gold->persona->total : old('gold'), ['class' => 'form-control']) !!}
</div>

<!-- Iron Field -->
<div class="form-group col-sm-6">
	{!! Form::label('iron', 'Iron On Hand:') !!}
	{!! Form::number('iron', isset($npc) ? $npc->iron->persona->total : old('iron'), ['class' => 'form-control']) !!}
</div>

<!-- Timber Field -->
<div class="form-group col-sm-6">
	{!! Form::label('timber', 'Timber On Hand:') !!}
	{!! Form::number('timber', isset($npc) ? $npc->timber->persona->total : old('timber'), ['class' => 'form-control']) !!}
</div>

<!-- Stone Field -->
<div class="form-group col-sm-6">
	{!! Form::label('stone', 'Stone On Hand:') !!}
	{!! Form::number('stone', isset($npc) ? $npc->stone->persona->total : old('stone'), ['class' => 'form-control']) !!}
</div>

<!-- Grain Field -->
<div class="form-group col-sm-6">
	{!! Form::label('grain', 'Grain On Hand:') !!}
	{!! Form::number('grain', isset($npc) ? $npc->grain->persona->total : old('grain'), ['class' => 'form-control']) !!}
</div>

<!-- Action Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('action_id', 'Default Action:') !!}
	{!! Form::select('action_id', ['' => 'None'] + $actions, old('action_id'), ['class' => 'form-control']) !!}
</div>

<!-- Deceased Field -->
<div class="form-group col-sm-6">
	{!! Form::label('deceased', 'Deceased:') !!}
	{!! Form::date('deceased', old('deceased'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('npcs.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
