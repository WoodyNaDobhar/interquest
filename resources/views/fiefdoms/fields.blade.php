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

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('fiefdoms.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
