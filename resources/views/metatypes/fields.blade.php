<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($metatype) ? $metatype->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', isset($metatype) ? $metatype->description : old('description'), ['class' => 'form-control']) !!}
</div>

<!-- Personable Field -->
<div class="form-group col-sm-6">
	{!! Form::label('personable', 'Personable:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('personable', isset($metatype) ? ($metatype->personable == 1 ? 'true' : 'false') : (old('personable') == 1 ? 'true' : 'false')) !!}
		{!! Form::checkbox('personable', '1', isset($metatype) ? ($metatype->personable == 1 ? ['checked' => 'checked'] : null) : (old('personable') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('metatypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
