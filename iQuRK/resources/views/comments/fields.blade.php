<!-- Commented Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('commented_id', 'Commented Id:') !!}
	{!! Form::number('commented_id', isset($comment) ? $comment->commented_id : old('commented_id'), ['class' => 'form-control']) !!}
</div>

<!-- Commented Type Field -->
<div class="form-group col-sm-6">
	{!! Form::label('commented_type', 'Commented Type:') !!}
	{!! Form::text('commented_type', isset($comment) ? $comment->commented_type : old('commented_type'), ['class' => 'form-control']) !!}
</div>

<!-- Author Persona Id Field -->
<div class="form-group col-sm-6">
	{!! Form::label('author_persona_id', 'Author Persona Id:') !!}
	{!! Form::number('author_persona_id', isset($comment) ? $comment->author_persona_id : old('author_persona_id'), ['class' => 'form-control']) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
	{!! Form::label('subject', 'Subject:') !!}
	{!! Form::text('subject', isset($comment) ? $comment->subject : old('subject'), ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
	{!! Form::label('message', 'Message:') !!}
	{!! Form::textarea('message', isset($comment) ? $comment->message : old('message'), ['class' => 'form-control']) !!}
</div>

<!-- Show Mapkeepers Field -->
<div class="form-group col-sm-6">
	{!! Form::label('show_mapkeepers', 'Show Mapkeepers:') !!}
	<label class="checkbox-inline">
		{!! Form::hidden('show_mapkeepers', isset($comment) ? ($comment->show_mapkeepers == 1 ? 'true' : 'false') : (old('show_mapkeepers') == 1 ? 'true' : 'false')) !!}
		{!! Form::checkbox('show_mapkeepers', '1', isset($comment) ? ($comment->show_mapkeepers == 1 ? ['checked' => 'checked'] : null) : (old('show_mapkeepers') == 1 ? ['checked' => 'checked'] : null)) !!}
	</label>
</div>

<!-- Submit Field -->
@if(Request::segment(1) != 'sparse')
<div class="form-group col-sm-12">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{!! route('comments.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif
