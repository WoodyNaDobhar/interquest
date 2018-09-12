<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($fiefdom) ? $fiefdom->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
	{!! Form::label('image', 'Heraldry:') !!}
	{!! Form::select('image', [
			'' => 'None',
			'file' => 'Uploaded Image'
		],
		isset($fiefdom) ? $fiefdom->image : old('image'), 
		[
			'class' => 'form-control personaImageFile'
		]) 
	!!}
	<input id="imageFile" name="image"{!! isset($fiefdom) && $fiefdom->image == 'file' ? '' : ' disabled="disabled"' !!} type="file" style="{!! isset($fiefdom) && $fiefdom->image == 'file' ? '' : 'display: none;' !!}">
</div>

@if(isset($rulerId))
	
{!! Form::hidden('ruler_id', $rulerId, ['id' => 'ruler_id']) !!}
{!! Form::hidden('ruler_type', $rulerType, ['id' => 'ruler_type']) !!}

@else

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('ruler_id', 'Ruler:') !!}
	{!! Form::select(
			'ruler_type_selected', 
			[
				'' => 'No Ruler',
				'Npc' => 'NPC',
				'Persona' => 'Persona'
			], 
			isset($fiefdom) ? $fiefdom->ruler_type : old('ruler_type'), 
			[
				'class' => 'form-control typeSelect typeTarget',
				'data-type' => 'Fiefdom', 
				'data-name' => 'ruler_type',
				'id' => 'ruler_type_selected', 
				'style' => (
					isset($fiefdom) ? 
						'' : 
						'display: none;'
				)
			]
		) 
	!!}
	{!! Form::hidden('ruler_type', isset($fiefdom) ? $fiefdom->ruler_type : old('ruler_type'), ['id' => 'ruler_type']) !!}
	{!! Form::select(
			'npc_ruler_id', 
			[
				'' => 'Select One',
				'newNpc' => 'Create New'
			] + $rulersNpcs, 
			(
				isset($fiefdom) && $fiefdom->ruler_type == 'Npc' ? 
					(
						$fiefdom->ruler_id ? 
							$fiefdom->ruler_id : 
							old('ruler_id')
					) : 
					null
			), 
			[
				'class' => 'form-control makeNew typeTarget relatedSource', 
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
						$fiefdom->ruler_id ?
							$fiefdom->ruler_id :
							old('ruler_id')
					) : 
					null
			),
			[
				'class' => 'form-control typeTarget relatedSource',
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
	{!! Form::hidden('ruler_id', isset($fiefdom) ? $fiefdom->ruler_id : old('ruler_id'), ['id' => 'ruler_id']) !!}
</div>

@endif

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('fiefdoms.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
