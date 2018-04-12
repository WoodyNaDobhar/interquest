<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
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

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('fiefdoms.index') !!}" class="btn btn-default">Cancel</a>
</div>
