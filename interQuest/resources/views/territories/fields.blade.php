<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::number('name', null, ['class' => 'form-control']) !!}
</div>

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

<!-- Terrain Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('terrain_id', 'Terrain Id:') !!}
    {!! Form::number('terrain_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Primary Resource Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primary_resource', 'Primary Resource:') !!}
    {!! Form::text('primary_resource', null, ['class' => 'form-control']) !!}
</div>

<!-- Secondary Resource Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondary_resource', 'Secondary Resource:') !!}
    {!! Form::text('secondary_resource', null, ['class' => 'form-control']) !!}
</div>

<!-- Castle Strength Field -->
<div class="form-group col-sm-6">
    {!! Form::label('castle_strength', 'Castle Strength:') !!}
    {!! Form::number('castle_strength', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Wasteland Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_wasteland', 'Is Wasteland:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_wasteland', false) !!}
        {!! Form::checkbox('is_wasteland', '1', null) !!} 1
    </label>
</div>

<!-- Is No Mans Land Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_no_mans_land', 'Is No Mans Land:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_no_mans_land', false) !!}
        {!! Form::checkbox('is_no_mans_land', '1', null) !!} 1
    </label>
</div>

<!-- Has Road Field -->
<div class="form-group col-sm-6">
    {!! Form::label('has_road', 'Has Road:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('has_road', false) !!}
        {!! Form::checkbox('has_road', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('territories.index') !!}" class="btn btn-default">Cancel</a>
</div>
