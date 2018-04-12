<!-- Row Field -->
<div class="form-group col-sm-6">
    {!! Form::label('row', 'Row:') !!}
    {!! Form::number('row', null, ['class' => 'form-control']) !!}
</div>

<!-- Column Field -->
<div class="form-group col-sm-6">
    {!! Form::label('column', 'Column:') !!}
    {!! Form::number('column', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('sectors.index') !!}" class="btn btn-default">Cancel</a>
</div>
