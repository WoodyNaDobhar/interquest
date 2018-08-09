<!-- Is Mapkeeper Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_mapkeeper', 'Is Mapkeeper:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('is_mapkeeper', isset($user) ? ($user->is_mapkeeper == 1 ? 'true' : 'false') : (old('is_mapkeeper') == 1 ? 'true' : 'false')) !!}
		{!! Form::checkbox('is_mapkeeper', '1', isset($user) ? ($user->is_mapkeeper == 1 ? ['checked' => 'checked'] : null) : (old('is_mapkeeper') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Is Admin Field -->
<div class="form-group col-sm-6">
	{!! Form::label('is_admin', 'Is Admin:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('is_admin', isset($user) ? ($user->is_admin == 1 ? 'true' : 'false') : (old('is_admin') == 1 ? 'true' : 'false')) !!}
		{!! Form::checkbox('is_admin', '1', isset($user) ? ($user->is_admin == 1 ? ['checked' => 'checked'] : null) : (old('is_admin') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
