<!-- Changed Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('changed_id', 'Changed Id:') !!}
    {!! Form::number('changed_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Changed Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('changed_type', 'Changed Type:') !!}
    {!! Form::text('changed_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('revisions.index') !!}" class="btn btn-default">Cancel</a>
</div>
