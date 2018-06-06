<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Building Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('building_id', 'Building Id:') !!}
    {!! Form::number('building_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Territory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('territory_id', 'Territory Id:') !!}
    {!! Form::number('territory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Size Field -->
<div class="form-group col-sm-6">
    {!! Form::label('size', 'Size:') !!}
    {!! Form::number('size', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('buildingTerritories.index') !!}" class="btn btn-default">Cancel</a>
</div>
