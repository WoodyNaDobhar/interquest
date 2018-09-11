<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($metatype) ? $metatype->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Type Field -->
<div class="form-group col-sm-6">
	{!! Form::label('type', 'Type:') !!}
	{!! Form::select('type', 
		[
			'Animation' => 'Animation',
			'Beast' => 'Beast',
			'Botanical' => 'Botanical',
			'Extra-Planar' => 'Extra-Planar',
			'Extra-Planar Animation' => 'Extra-Planar Animation',
			'Fey' => 'Fey',
			'Humanoid' => 'Humanoid',
			'Legendary Beast' => 'Legendary Beast',
			'Legendary Fey' => 'Legendary Fey',
			'Undead' => 'Undead'
		], 
		isset($metatype) ? $metatype->type : old('type'), 
		['class' => 'form-control']
	) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', isset($metatype) ? $metatype->description : old('description'), ['class' => 'form-control']) !!}
</div>

<!-- Garb Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('garb', 'Garb:') !!}
	{!! Form::textarea('garb', isset($metatype) ? $metatype->garb : old('garb'), ['class' => 'form-control']) !!}
</div>

<!-- Power Field -->
<div class="form-group col-sm-6">
	{!! Form::label('power', 'Power Level:') !!}
	{!! Form::number('power', isset($metatype) ? $metatype->power : old('power'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Level Field -->
<div class="form-group col-sm-6">
	{!! Form::label('level', 'Level:') !!}
	{!! Form::number('level', isset($metatype) ? $metatype->level : old('level'), ['class' => 'form-control', (Auth::user()->is_admin || Auth::user()->is_mapkeeper) ? '' : 'disabled' => 'disabled']) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('metatypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
