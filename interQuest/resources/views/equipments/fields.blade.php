<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Units Field -->
<div class="form-group col-sm-6">
    {!! Form::label('units', 'Units:') !!}
    {!! Form::number('units', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Weight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('weight', 'Weight:') !!}
    {!! Form::number('weight', null, ['class' => 'form-control']) !!}
</div>

<!-- Cargo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cargo', 'Cargo:') !!}
    {!! Form::number('cargo', null, ['class' => 'form-control']) !!}
</div>

<!-- Craft Gold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_gold', 'Craft Gold:') !!}
    {!! Form::number('craft_gold', null, ['class' => 'form-control']) !!}
</div>

<!-- Craft Iron Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_iron', 'Craft Iron:') !!}
    {!! Form::number('craft_iron', null, ['class' => 'form-control']) !!}
</div>

<!-- Craft Timber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_timber', 'Craft Timber:') !!}
    {!! Form::number('craft_timber', null, ['class' => 'form-control']) !!}
</div>

<!-- Craft Stone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_stone', 'Craft Stone:') !!}
    {!! Form::number('craft_stone', null, ['class' => 'form-control']) !!}
</div>

<!-- Craft Grain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_grain', 'Craft Grain:') !!}
    {!! Form::number('craft_grain', null, ['class' => 'form-control']) !!}
</div>

<!-- Craft Actions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('craft_actions', 'Craft Actions:') !!}
    {!! Form::number('craft_actions', null, ['class' => 'form-control']) !!}
</div>

<!-- Building Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('building_id', 'Building Id:') !!}
    {!! Form::number('building_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Artifact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_artifact', 'Is Artifact:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_artifact', false) !!}
        {!! Form::checkbox('is_artifact', '1', null) !!} 1
    </label>
</div>

<!-- Is Relic Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_relic', 'Is Relic:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_relic', false) !!}
        {!! Form::checkbox('is_relic', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('equipments.index') !!}" class="btn btn-default">Cancel</a>
</div>
