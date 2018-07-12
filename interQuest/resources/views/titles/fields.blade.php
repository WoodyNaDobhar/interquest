<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
</div>

<!-- Is Landed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_landed', 'Is Landed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_landed', false) !!}
        {!! Form::checkbox('is_landed', '1', null) !!}
    </label>
</div>

<!-- Hierarchy Field -->
<div class="form-group col-sm-6">
    {!! Form::label('hierarchy', 'Hierarchy:') !!}
    {!! Form::number('hierarchy', old('hierarchy'), ['class' => 'form-control']) !!}
</div>

<!-- Fiefs Maximum Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiefs_maximum', 'Fiefs Maximum:') !!}
    {!! Form::number('fiefs_maximum', old('fiefs_maximum'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('titles.index') !!}" class="btn btn-default">Cancel</a>
</div>
