<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $sectors->id !!}</p>
</div>

<!-- Row Field -->
<div class="form-group">
    {!! Form::label('row', 'Row:') !!}
    <p>{!! $sectors->row !!}</p>
</div>

<!-- Column Field -->
<div class="form-group">
    {!! Form::label('column', 'Column:') !!}
    <p>{!! $sectors->column !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $sectors->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $sectors->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $sectors->deleted_at !!}</p>
</div>

