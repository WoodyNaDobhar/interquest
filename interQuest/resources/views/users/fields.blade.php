<!-- Is Mapkeeper Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_mapkeeper', 'Is Mapkeeper:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_mapkeeper', false) !!}
        {!! Form::checkbox('is_mapkeeper', '1', null) !!} 1
    </label>
</div>

<!-- Is Admin Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_admin', 'Is Admin:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_admin', false) !!}
        {!! Form::checkbox('is_admin', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('users.index') !!}" class="btn btn-default">Cancel</a>
</div>
