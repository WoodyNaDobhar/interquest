<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
	{!! Form::label('image', 'Heraldry:') !!}
	{!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('ruler_id', 'Ruler:') !!}
	{!! Form::select('ruler_type', [
		'' => 'No Ruler',
		'Npc' => 'NPC',
		'Persona' => 'Persona'
	], $rulerType ? $rulerType : old('ruler_type'), ['class' => 'form-control typeSelect']) !!}
	{!! Form::select(
			'npc_ruler_id',  
			['' => 'Select One'] + 
			['npcCreateWidget' => 'Create New'] + 
			$rulersNpcs, 
			(
				$rulerType && $rulerType == 'Npc' ? 
					(
						old('ruler_id') ? 
							old('ruler_id') : 
							$rulerId
					) : 
					null
			), 
			[
				'class' => 'form-control typeTarget', 
				'data-type' => 'Npc', 
				'data-name' => 'ruler_id', 
				'style' => 
					(
						$rulerType && $rulerType  == 'Npc' ? 
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
				$rulerType && $rulerType  == 'Persona' ?
					(
						old('ruler_id') ?
							old('ruler_id') :
							$rulerId
					) : 
					null
			),
			[
				'class' => 'form-control typeTarget',
				'data-type' => 'Persona',
				'data-name' => 'ruler_id',
				'style' => 
					(
						$rulerType && $rulerType  == 'Persona' ?
							'' :
							'display: none;'
					)
			]
		)
	!!}
	{!! Form::hidden('ruler_id', $rulerId ? $rulerId : old('ruler_id')) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('fiefdoms.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
