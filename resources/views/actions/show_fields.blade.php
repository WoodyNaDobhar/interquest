<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $action->name !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $action->description !!}</p>
</div>

<!-- Is Common Field -->
<div class="form-group">
    {!! Form::label('is_common', 'Is Common:') !!}
    <p>{!! $action->is_common !!}</p>
</div>

<!-- Is Landed Field -->
<div class="form-group">
    {!! Form::label('is_landed', 'Is Landed:') !!}
    <p>{!! $action->is_landed !!}</p>
</div>

<!-- Check Required Field -->
<div class="form-group">
    {!! Form::label('check_required', 'Check Required:') !!}
    <p>{!! $action->check_required !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $action->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $action->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $action->deleted_at !!}</p>
</div>

