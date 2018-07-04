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

<!-- Is Common Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_common', 'Is Common:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_common', false) !!}
        {!! Form::checkbox('is_common', '1', null) !!}
    </label>
</div>

<!-- Is Landed Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_landed', 'Is Landed:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_landed', false) !!}
        {!! Form::checkbox('is_landed', '1', null) !!}
    </label>
</div>

<!-- Check Required Field -->
<div class="form-group col-sm-6">
    {!! Form::label('check_required', 'Check Required:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('check_required', false) !!}
        {!! Form::checkbox('check_required', '1', null) !!}
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('actions.index') !!}" class="btn btn-default">Cancel</a>
</div>
