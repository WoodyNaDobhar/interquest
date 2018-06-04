<!-- Action Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('action_id', 'Action Id:') !!}
    {!! Form::number('action_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('persona_id', 'Persona Id:') !!}
    {!! Form::number('persona_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Source Territory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('source_territory_id', 'Source Territory Id:') !!}
    {!! Form::number('source_territory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Target Territory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('target_territory_id', 'Target Territory Id:') !!}
    {!! Form::number('target_territory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Result Field -->
<div class="form-group col-sm-6">
    {!! Form::label('result', 'Result:') !!}
    {!! Form::number('result', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('actionPersonas.index') !!}" class="btn btn-default">Cancel</a>
</div>
