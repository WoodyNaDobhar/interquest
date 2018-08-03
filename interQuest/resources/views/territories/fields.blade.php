<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Terrain Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('terrain_id', 'Terrain:') !!}
	{!! Form::select('terrain_id', $terrains, old('terrain_id'), ['class' => 'form-control']) !!}
</div>

<!-- Column Field -->
<div class="form-group col-sm-6">
	{!! Form::label('column', 'Longitude:') !!}
	{!! Form::text('column', isset($location) ? $location['column'] : old('column'), ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<!-- Row Field -->
<div class="form-group col-sm-6">
	{!! Form::label('row', 'Latitude:') !!}
	{!! Form::text('row', isset($location) ? $location['row'] : old('row'), ['class' => 'form-control', 'readonly' => 'readonly']) !!}
</div>

<!-- Primary Resource Field -->
<div class="form-group col-sm-6">
	{!! Form::label('primary_resource', 'Primary Resource:') !!}
	{!! Form::select('primary_resource', [
		'Grain' => 'Grain',
		'Iron' => 'Iron',
		'Stone' => 'Stone',
		'Timber' => 'Timber',
		'Trade' => 'Trade'
	], old('primary_resource'), ['class' => 'form-control']) !!}
</div>

<!-- Secondary Resource Field -->
<div class="form-group col-sm-6">
	{!! Form::label('secondary_resource', 'Secondary Resource:') !!}
	{!! Form::select('secondary_resource', [
		'' => 'None',
		'Grain' => 'Grain',
		'Iron' => 'Iron',
		'Stone' => 'Stone',
		'Timber' => 'Timber',
		'Trade' => 'Trade'
	], old('secondary_resource'), ['class' => 'form-control']) !!}
</div>

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('ruler_id', 'Ruler:') !!}
	{!! Form::select(
			'ruler_type', 
			[
				'' => 'No Ruler',
				'Npc' => 'NPC',
				'Persona' => 'Persona'
			], 
			old('ruler_type'), 
			[
				'class' => 'form-control typeSelect',
				'id' => 'ruler_type'
			]
		) 
	!!}
	{!! Form::select(
			'npc_ruler_id', 
			[
				'' => 'Select One',
				'npcCreateWidget' => 'Create New'
			] + $rulersNpcs, 
			(
				isset($fiefdom) && $fiefdom->ruler_type == 'Npc' ? 
					(
						old('ruler_id') ? 
							old('ruler_id') : 
							$fiefdom->ruler_id
					) : 
					null
			), 
			[
				'class' => 'form-control typeTarget', 
				'data-type' => 'Npc', 
				'data-name' => 'ruler_id', 
				'style' => 
					(
						isset($fiefdom) && $fiefdom->ruler_type == 'Npc' ? 
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
				isset($fiefdom) && $fiefdom->ruler_type == 'Persona' ?
					(
						old('ruler_id') ?
							old('ruler_id') :
							$fiefdom->ruler_id
					) : 
					null
			),
			[
				'class' => 'form-control typeTarget',
				'data-type' => 'Persona',
				'data-name' => 'ruler_id',
				'style' => 
					(
						isset($fiefdom) && $fiefdom->ruler_type == 'Persona' ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('ruler_id', old('ruler_id')) !!}
	{!! Form::select(
			'ruler_fiefdom_id',
			array_merge(
				[
					'' => 'Auto Generate Fiefdom',
					'newFiefdom' => 'Create New Fiefdom'
				], 
				isset($rulerFiefdoms) && is_array($rulerFiefdoms) ? $rulerFiefdoms : []
			),
			(
				isset($fiefdom) ?
					$fiefdom->id :
					old('ruler_id')
			),
			[
				'id' => 'ruler_fiefdom_id',
				'class' => 'form-control',
				'data-name' => 'fiefdom_id',
				'style' => 
					(
						isset($fiefdom) ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('fiefdom_id', old('fiefdom_id'), ['id' => 'fiefdom_id']) !!}
</div>

<!-- Castle Strength Field -->
<div class="form-group col-sm-6">
	{!! Form::label('castle_strength', 'Castle Strength:') !!}
	{!! Form::select('castle_strength', [
		0 => '0',
		1 => '1',
		2 => '2',
		3 => '3',
		4 => '4',
		5 => '5',
		6 => '6',
	], old('castle_strength'), ['class' => 'form-control']) !!}
</div>

<!-- Gold Field -->
<div class="form-group col-sm-6">
	{!! Form::label('gold', 'Gold:') !!}
	{!! Form::number('gold', old('gold'), ['class' => 'form-control']) !!}
</div>

<!-- Iron Field -->
<div class="form-group col-sm-6">
	{!! Form::label('iron', 'Iron:') !!}
	{!! Form::number('iron', old('iron'), ['class' => 'form-control']) !!}
</div>

<!-- Timber Field -->
<div class="form-group col-sm-6">
	{!! Form::label('timber', 'Timber:') !!}
	{!! Form::number('timber', old('timber'), ['class' => 'form-control']) !!}
</div>

<!-- Stone Field -->
<div class="form-group col-sm-6">
	{!! Form::label('stone', 'Stone:') !!}
	{!! Form::number('stone', old('stone'), ['class' => 'form-control']) !!}
</div>

<!-- Grain Field -->
<div class="form-group col-sm-6">
	{!! Form::label('grain', 'Grain:') !!}
	{!! Form::number('grain', old('grain'), ['class' => 'form-control']) !!}
</div>

<!-- Is Wasteland Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_wasteland', 'Is Wasteland:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('is_wasteland', false) !!}
		{!! Form::checkbox('is_wasteland', '1', null) !!}
	</label>
</div>

<!-- Is No Mans Land Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_no_mans_land', 'Is No Mans Land:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('is_no_mans_land', false) !!}
		{!! Form::checkbox('is_no_mans_land', '1', null) !!}
	</label>
</div>

<!-- Submit Field -->
@if (Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('territories.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
