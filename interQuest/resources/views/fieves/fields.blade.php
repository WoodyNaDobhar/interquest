<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Territory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('territory_id', 'Territory Id:') !!}
    {!! Form::number('territory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Fiefdom Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiefdom_id', 'Fiefdom Id:') !!}
    {!! Form::number('fiefdom_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruler_id', 'Ruler Id:') !!}
    {!! Form::number('ruler_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Ruler Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruler_type', 'Ruler Type:') !!}
    {!! Form::text('ruler_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Steward Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('steward_id', 'Steward Id:') !!}
    {!! Form::number('steward_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Steward Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('steward_type', 'Steward Type:') !!}
    {!! Form::text('steward_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fieves.index') !!}" class="btn btn-default">Cancel</a>
</div>
