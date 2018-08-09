<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($vocation) ? $vocation->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Ability Field -->
<div class="form-group col-sm-6">
	{!! Form::label('ability', 'Ability:') !!}
	{!! Form::text('ability', isset($vocation) ? $vocation->ability : old('ability'), ['class' => 'form-control']) !!}
</div>

<!-- Ability Description Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('ability_description', 'Ability Description:') !!}
	{!! Form::textarea('ability_description', isset($vocation) ? $vocation->ability_description : old('ability_description'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('vocations.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
