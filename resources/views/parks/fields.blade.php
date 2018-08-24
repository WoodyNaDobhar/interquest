<!-- Rank Field -->
<div class="form-group col-sm-6">
	{!! Form::label('rank', 'Rank:') !!}
	{!! Form::select('rank', [
		'Shire' => 'Shire', 
		'Barony' => 'Barony', 
		'Duchy' => 'Duchy', 
		'Grand Duchy' => 'Grand Duchy', 
		'Principality' => 'Principality'
	], isset($park) ? $park->rank : old('rank'), ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Settlement Name:') !!}
	{!! Form::text('name', isset($park) ? $park->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Orkid Field -->
<div class="form-group col-sm-6">
	{!! Form::label('orkID', 'ORK Id:') !!}
	{!! Form::text('orkID', isset($park) ? $park->orkID : old('orkID'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!-- Territory Field -->
<div class="form-group col-sm-6">
	{!! Form::label('territory_id', 'Territory Id:') !!}
	{!! Form::text('territory_id', isset($park) ? $park->territory_id : old('territory_id'), ['class' => 'form-control', 'disabled' => 'disabled']) !!}
</div>

<!-- Midreign Field -->
<div class="form-group col-sm-6">
	{!! Form::label('deceased', 'Midreign:') !!}
	{!! Form::date('deceased', isset($park) ? $park->deceased : old('deceased'), ['class' => 'form-control']) !!}
</div>

<!-- Coronation Field -->
<div class="form-group col-sm-6">
	{!! Form::label('deceased', 'Coronation:') !!}
	{!! Form::date('deceased', isset($park) ? $park->deceased : old('deceased'), ['class' => 'form-control']) !!}
</div>

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('ruler', 'Monarch:') !!}
	{!! Form::select(
			'ruler_type', 
			[
				'Npc' => 'NPC',
				'Persona' => 'Persona'
			], 
			isset($park) ? $park->ruler_type : old('ruler_type'), 
			[
				'class' => 'form-control typeSelect',
				'data-type' => 'Ruler', 
				'id' => 'ruler_type'
			]
		) 
	!!}
	{!! Form::select(
			'npc_ruler_id', 
			[
				'' => 'Select One',
				'newNpc' => 'Create New'
			] + $rulersNpcs, 
			(
				isset($park) && $park->ruler_type == 'Npc' ? 
					(
						$park->ruler_id ? 
							$park->ruler_id : 
							old('ruler_id')
					) : 
					null
			), 
			[
				'class' => 'form-control makeNew typeTarget', 
				'data-type' => 'Npc', 
				'data-name' => 'ruler_id', 
				'style' => 
					(
						isset($park) && $park->ruler_type == 'Npc' ? 
							'' : 
							'display: none;'
					)
			]
		) 
	!!}
	{!! Form::select(
			'persona_ruler_id',
			['0' => 'Select One'] + $rulersPersonae,
			(
				isset($park) && $park->ruler_type == 'Persona' ?
					(
						$park->ruler_id ?
							$park->ruler_id :
							old('ruler_id')
							
					) : 
					null
			),
			[
				'class' => 'form-control typeTarget',
				'data-type' => 'Persona',
				'data-name' => 'ruler_id',
				'style' => 
					(
						isset($park) && $park->ruler_type == 'Persona' ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('ruler_id', isset($park) ? $park->ruler_id : old('ruler_id'), ['id' => 'ruler_id']) !!}
</div>

<!-- Submit Field -->
@if(!isset($suppressSave) || $suppressSave === false)
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('parks.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif