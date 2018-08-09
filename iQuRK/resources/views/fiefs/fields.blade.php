<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($fief) ? $fief->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Territory Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('territory_id', 'Territory Id:') !!}
	{!! Form::select('territory_id', $territories, isset($fief) ? $fief->territory_id : (isset($territory) ? $territory->id : old('territory_id')), ['class' => 'form-control']) !!}
</div>

<!-- Fiefdom Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('fiefdom_id', 'Fiefdom Type:') !!}
	{!! Form::select(
			'fiefdom_type', 
			[
				'' => 'Select One',
				'Park' => 'Park',
				'Fiefdom' => 'Noble or NPC'
			], 
			old('fiefdom_type'), 
			[
				'class' => 'form-control typeSelect',
				'id' => 'fiefdom_type'
			]
		) 
	!!}
	{!! Form::select(
			'park_fiefdom_id', 
			[
				$park->id => $park->name
			], 
			(
				isset($fiefdom) && $fiefdom->fiefdom_type == 'Park' ? 
					(
						old('fiefdom_id') ? 
							old('fiefdom_id') : 
							$fiefdom->fiefdom_id
					) : 
					null
			), 
			[
				'class' => 'form-control typeTarget',
				'data-type' => 'Park', 
				'data-name' => 'fiefdom_id', 
				'style' => 
					(
						isset($fiefdom) && $fiefdom->fiefdom_type == 'Npc' ? 
							'' : 
							'display: none;'
					)
			]
		) 
	!!}
	{!! Form::select(
			'fiefdom_fiefdom_id',
			[
				'' => 'Select One',
				'newFiefdom' => 'Create New'
			] + $fiefdoms,
			(
				isset($fiefdom) && $fiefdom->fiefdom_type == 'Fiefdom' ?
					(
						old('fiefdom_id') ?
							old('fiefdom_id') :
							$fiefdom->fiefdom_id
					) : 
					null
			),
			[
				'class' => 'form-control typeTarget',
				'data-type' => 'Fiefdom',
				'data-name' => 'fiefdom_id',
				'style' => 
					(
						isset($fiefdom) && $fiefdom->fiefdom_type == 'Fiefdom' ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('fiefdom_id', isset($territory) ? $territory->fiefdom_id : old('fiefdom_id')) !!}
</div>

<!-- Steward Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('steward_id', 'Steward:') !!}
	{!! Form::select(
			'steward_type', 
			[
				'' => 'No Steward',
				'Npc' => 'NPC',
				'Persona' => 'Persona'
			], 
			old('steward_type'), 
			[
				'class' => 'form-control typeSelect',
				'id' => 'steward_type'
			]
		) 
	!!}
	{!! Form::select(
			'npc_steward_id', 
			[
				'' => 'Select One',
				'newNpc' => 'Create New'
			] + $stewardsNpcs, 
			(
				isset($fiefdom) && $fiefdom->steward_type == 'Npc' ? 
					(
						old('steward_id') ? 
							old('steward_id') : 
							$fiefdom->steward_id
					) : 
					null
			), 
			[
				'class' => 'form-control makeNew typeTarget showSource', 
				'data-type' => 'Npc', 
				'data-name' => 'steward_id', 
				'style' => 
					(
						isset($fiefdom) && $fiefdom->steward_type == 'Npc' ? 
							'' : 
							'display: none;'
					)
			]
		) 
	!!}
	{!! Form::select(
			'persona_steward_id',
			['0' => 'Select One'] + $stewardsPersonae,
			(
				isset($fiefdom) && $fiefdom->steward_type == 'Persona' ?
					(
						old('steward_id') ?
							old('steward_id') :
							$fiefdom->steward_id
					) : 
					null
			),
			[
				'class' => 'form-control typeTarget showSource',
				'data-type' => 'Persona',
				'data-name' => 'steward_id',
				'style' => 
					(
						isset($fiefdom) && $fiefdom->steward_type == 'Persona' ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('steward_id', isset($territory) ? $territory->steward_id : old('steward_id')) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('fiefs.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
