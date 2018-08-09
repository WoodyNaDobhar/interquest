<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($terrain) ? $terrain->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-6">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::text('description', isset($terrain) ? $terrain->description : old('description'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('terrains.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
