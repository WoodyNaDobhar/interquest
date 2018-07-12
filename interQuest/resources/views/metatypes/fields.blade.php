<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', old('description'), ['class' => 'form-control']) !!}
</div>

<!-- Personable Field -->
<div class="form-group col-sm-6">
    {!! Form::label('personable', 'Personable:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('personable', false) !!}
        {!! Form::checkbox('personable', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('metatypes.index') !!}" class="btn btn-default">Cancel</a>
</div>
