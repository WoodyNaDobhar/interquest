<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $fiefdom->name !!}</p>
</div>

<!-- Ruler Id Field -->
<div class="form-group">
    {!! Form::label('ruler_id', 'Ruler Id:') !!}
    <p>{!! $fiefdom->ruler_id !!}</p>
</div>

<!-- Ruler Type Field -->
<div class="form-group">
    {!! Form::label('ruler_type', 'Ruler Type:') !!}
    <p>{!! $fiefdom->ruler_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $fiefdom->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $fiefdom->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $fiefdom->deleted_at !!}</p>
</div>

