<!-- Name Field -->
<div class="form-group col-sm-6">
	{!! Form::label('name', 'Name:') !!}
	{!! Form::text('name', isset($territory) ? $territory->name : old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('description', 'Description:') !!}
	{!! Form::textarea('description', isset($territory) ? $territory->description : old('description'), ['class' => 'form-control']) !!}
</div>

<!-- Is Common Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_common', 'Is Common:') !!}
	<label class="checkbox-inline">
		{!! Form::checkbox('is_common', '1', isset($action) ? ($action->is_common == 1 ? ['checked' => 'checked'] : null) : (old('is_common') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Is Landed Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_landed', 'Is Landed:') !!}
	<label class="checkbox-inline">
		{!! Form::checkbox('is_landed', '1', isset($action) ? ($action->is_landed == 1 ? ['checked' => 'checked'] : null) : (old('is_landed') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Check Required Field -->
<div class="form-group col-sm-6">
	{!! Form::label('check_required', 'Check Required:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('check_required', isset($action) ? ($action->check_required == 1 ? 'true' : 'false') : (old('check_required') == 1 ? 'true' : 'false')) !!}
		{!! Form::checkbox('check_required', '1', isset($action) ? ($action->check_required == 1 ? ['checked' => 'checked'] : null) : (old('check_required') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('actions.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
