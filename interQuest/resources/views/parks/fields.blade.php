<!-- Orkid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orkID', 'Orkid:') !!}
    {!! Form::number('orkID', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Rank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rank', 'Rank:') !!}
    {!! Form::text('rank', null, ['class' => 'form-control']) !!}
</div>

<!-- Lat Field -->
<div class="form-group col-sm-6">
    {!! Form::label('territory_id', 'Map Row:') !!}
    {!! Form::number('territory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Midreign Field -->
<div class="form-group col-sm-6">
    {!! Form::label('midreign', 'Midreign:') !!}
    {!! Form::date('midreign', null, ['class' => 'form-control']) !!}
</div>

<!-- Coronation Field -->
<div class="form-group col-sm-6">
    {!! Form::label('coronation', 'Coronation:') !!}
    {!! Form::date('coronation', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parks.index') !!}" class="btn btn-default">Cancel</a>
</div>
