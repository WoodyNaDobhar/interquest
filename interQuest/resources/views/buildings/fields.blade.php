<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Gold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_gold', 'Cost Gold:') !!}
    {!! Form::number('cost_gold', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Iron Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_iron', 'Cost Iron:') !!}
    {!! Form::number('cost_iron', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Timber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_timber', 'Cost Timber:') !!}
    {!! Form::number('cost_timber', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Stone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_stone', 'Cost Stone:') !!}
    {!! Form::number('cost_stone', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Grain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_grain', 'Cost Grain:') !!}
    {!! Form::number('cost_grain', null, ['class' => 'form-control']) !!}
</div>

<!-- Cost Actions Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cost_actions', 'Cost Actions:') !!}
    {!! Form::number('cost_actions', null, ['class' => 'form-control']) !!}
</div>

<!-- Expandable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_required', 'Expandable:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('expandable', false) !!}
        {!! Form::checkbox('expandable', '1', null) !!}
    </label>
</div>

<!-- Builds Maximum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('builds_maximum', 'Builds Maximum:') !!}
    {!! Form::number('builds_maximum', null, ['class' => 'form-control']) !!}
</div>

<!-- Resource Required Field -->
<div class="form-group col-sm-6">
    {!! Form::label('resource_required', 'Resource Required:') !!}
    {!! Form::select('resource_required', [
        	'' => 'None',
        	'Gold' => 'Gold', 
        	'Iron' => 'Iron', 
        	'Timber' => 'Timber', 
        	'Stone' => 'Stone', 
        	'Grain' => 'Grain'
        ], null, ['class' => 'form-control']) !!}
</div>

<!-- Building Required Field -->
<div class="form-group col-sm-6">
    {!! Form::label('building_required', 'Building Required:') !!}
    {!! Form::select('building_required', $buildings, null, ['class' => 'form-control']) !!}
</div>

<!-- Waterway Required Field -->
<div class="form-group col-sm-6">
    {!! Form::label('waterway_required', 'Waterway Required:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('waterway_required', false) !!}
        {!! Form::checkbox('waterway_required', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('buildings.index') !!}" class="btn btn-default">Cancel</a>
</div>
