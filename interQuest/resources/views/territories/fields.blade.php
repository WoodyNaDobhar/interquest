<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Row Field -->
<div class="form-group col-sm-6">
    {!! Form::label('row', 'Row:') !!}
    {!! Form::number('row', old('row'), ['class' => 'form-control']) !!}
</div>

<!-- Column Field -->
<div class="form-group col-sm-6">
    {!! Form::label('column', 'Column:') !!}
    {!! Form::number('column', old('column'), ['class' => 'form-control']) !!}
</div>

<!-- Terrain Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('terrain_id', 'Terrain Id:') !!}
    {!! Form::number('terrain_id', old('terrain_id'), ['class' => 'form-control']) !!}
</div>

<!-- Primary Resource Field -->
<div class="form-group col-sm-6">
    {!! Form::label('primary_resource', 'Primary Resource:') !!}
    {!! Form::text('primary_resource', old('primary_resource'), ['class' => 'form-control']) !!}
</div>

<!-- Secondary Resource Field -->
<div class="form-group col-sm-6">
    {!! Form::label('secondary_resource', 'Secondary Resource:') !!}
    {!! Form::text('secondary_resource', old('secondary_resource'), ['class' => 'form-control']) !!}
</div>

<!-- Castle Strength Field -->
<div class="form-group col-sm-6">
    {!! Form::label('castle_strength', 'Castle Strength:') !!}
    {!! Form::number('castle_strength', old('castle_strength'), ['class' => 'form-control']) !!}
</div>

<!-- Gold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gold', 'Gold:') !!}
    {!! Form::number('gold', old('gold'), ['class' => 'form-control']) !!}
</div>

<!-- Iron Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iron', 'Iron:') !!}
    {!! Form::number('iron', old('iron'), ['class' => 'form-control']) !!}
</div>

<!-- Timber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timber', 'Timber:') !!}
    {!! Form::number('timber', old('timber'), ['class' => 'form-control']) !!}
</div>

<!-- Stone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stone', 'Stone:') !!}
    {!! Form::number('stone', old('stone'), ['class' => 'form-control']) !!}
</div>

<!-- Grain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grain', 'Grain:') !!}
    {!! Form::number('grain', old('grain'), ['class' => 'form-control']) !!}
</div>

<!-- Is Wasteland Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_wasteland', 'Is Wasteland:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_wasteland', false) !!}
        {!! Form::checkbox('is_wasteland', '1', null) !!}
    </label>
</div>

<!-- Is No Mans Land Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_no_mans_land', 'Is No Mans Land:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_no_mans_land', false) !!}
        {!! Form::checkbox('is_no_mans_land', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('territories.index') !!}" class="btn btn-default">Cancel</a>
</div>
