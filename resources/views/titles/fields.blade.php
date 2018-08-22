<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($title) ? $title->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Is Landed Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_landed', 'Is Landed:') !!}
	<label class="checkbox-inline">
		{!! Form::checkbox('is_landed', '1', isset($title) ? ($title->is_landed == 1 ? ['checked' => 'checked'] : null) : (old('is_landed') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Hierarchy Field -->
<div class="form-group col-sm-6">
	{!! Form::label('hierarchy', 'Hierarchy:') !!}
	{!! Form::number('hierarchy', isset($title) ? $title->hierarchy : old('hierarchy'), ['class' => 'form-control']) !!}
</div>

<!-- Fiefs Maximum Field -->
<div class="form-group col-sm-6">
	{!! Form::label('fiefs_maximum', 'Fiefs Maximum:') !!}
	{!! Form::number('fiefs_maximum', isset($title) ? $title->fiefs_maximum : old('fiefs_maximum'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('titles.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
