<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $vocation->name !!}</p>
</div>

<!-- Ability Field -->
<div class="form-group">
    {!! Form::label('ability', 'Ability:') !!}
    <p>{!! $vocation->ability !!}</p>
</div>

<!-- Ability Description Field -->
<div class="form-group">
    {!! Form::label('ability_description', 'Ability Description:') !!}
    <p>{!! $vocation->ability_description !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $vocation->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $vocation->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $vocation->deleted_at !!}</p>
</div>

