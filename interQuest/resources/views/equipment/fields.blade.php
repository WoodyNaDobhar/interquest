<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', old('price'), ['class' => 'form-control']) !!}
</div>

<!-- Units Field -->
<div class="form-group col-sm-6">
    {!! Form::label('units', 'Units:') !!}
    {!! Form::number('units', old('units'), ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', old('weight'), ['class' => 'form-control']) !!}
</div>

<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo', 'Cargo:') !!}
    {!! Form::number('cargo', old('cargo'), ['class' => 'form-control']) !!}
</div>

<!-- Craft Gold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_gold', 'Craft Gold:') !!}
    {!! Form::number('craft_gold', old('craft_gold'), ['class' => 'form-control']) !!}
</div>

<!-- Craft Iron Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_iron', 'Craft Iron:') !!}
    {!! Form::number('craft_iron', old('craft_iron'), ['class' => 'form-control']) !!}
</div>

<!-- Craft Timber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_timber', 'Craft Timber:') !!}
    {!! Form::number('craft_timber', old('craft_timber'), ['class' => 'form-control']) !!}
</div>

<!-- Craft Stone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_stone', 'Craft Stone:') !!}
    {!! Form::number('craft_stone', old('craft_stone'), ['class' => 'form-control']) !!}
</div>

<!-- Craft Grain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_grain', 'Craft Grain:') !!}
    {!! Form::number('craft_grain', old('craft_grain'), ['class' => 'form-control']) !!}
</div>

<!-- Craft Actions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_actions', 'Craft Actions:') !!}
    {!! Form::number('craft_actions', old('craft_actions'), ['class' => 'form-control']) !!}
</div>

<!-- Building Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('building_id', 'Craft Building:') !!}
    {!! Form::select('building_id', $buildings, old('building_id'), ['class' => 'form-control']) !!}
</div>

<!-- Magic Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('magic_type', 'Magic Type:') !!}
    {!! Form::select('magic_type', [
			''			=> 'Not Magic',
			'Trinket'	=> 'Trinket',
			'Talisman'	=> 'Talisman',
			'Artifact'	=> 'Artifact'
		], old('magic_type'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipment.index') !!}" class="btn btn-default">Cancel</a>
</div>
