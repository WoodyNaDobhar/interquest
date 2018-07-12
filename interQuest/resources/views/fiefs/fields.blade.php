<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Territory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('territory_id', 'Territory Id:') !!}
    {!! Form::number('territory_id', old('territory_id'), ['class' => 'form-control']) !!}
</div>

<!-- Fiefdom Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiefdom_id', 'Fiefdom Id:') !!}
    {!! Form::number('fiefdom_id', old('fiefdom_id'), ['class' => 'form-control']) !!}
</div>

<!-- Fiefdom Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiefdom_type', 'Fiefdom Type:') !!}
    {!! Form::text('fiefdom_type', old('fiefdom_type'), ['class' => 'form-control']) !!}
</div>

<!-- Ruler Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruler_id', 'Ruler Id:') !!}
    {!! Form::number('ruler_id', old('ruler_id'), ['class' => 'form-control']) !!}
</div>

<!-- Ruler Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ruler_type', 'Ruler Type:') !!}
    {!! Form::text('ruler_type', old('ruler_type'), ['class' => 'form-control']) !!}
</div>

<!-- Steward Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('steward_id', 'Steward Id:') !!}
    {!! Form::number('steward_id', old('steward_id'), ['class' => 'form-control']) !!}
</div>

<!-- Steward Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('steward_type', 'Steward Type:') !!}
    {!! Form::text('steward_type', old('steward_type'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fiefs.index') !!}" class="btn btn-default">Cancel</a>
</div>
