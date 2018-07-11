<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('ruler_id', 'Ruler:') !!}
	{!! Form::select('ruler_type', [
		'' => 'Select Ruler Type',
		'Npc' => 'NPC',
		'Persona' => 'Persona'
	], old('ruler_type'), ['class' => 'form-control typeSelect']) !!}
	{!! Form::select(
			'npc_ruler_id', 
			['0' => 'Select One'] + $rulersNpcs, 
			(
				$fiefdom && $fiefdom->ruler_type == 'Npc' ? 
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
						$fiefdom && $fiefdom->ruler_type == 'Npc' ? 
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
				$fiefdom && $fiefdom->ruler_type == 'Persona' ?
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
						$fiefdom && $fiefdom->ruler_type == 'Persona' ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('ruler_id', old('ruler_id')) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('fiefdoms.index') !!}" class="btn btn-default">Cancel</a>
</div>
