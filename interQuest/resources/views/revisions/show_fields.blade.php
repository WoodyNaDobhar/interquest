<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $revisions->id !!}</p>
</div>

<!-- Changed Id Field -->
<div class="form-group">
    {!! Form::label('changed_id', 'Changed Id:') !!}
    <p>{!! $revisions->changed_id !!}</p>
</div>

<!-- Changed Type Field -->
<div class="form-group">
    {!! Form::label('changed_type', 'Changed Type:') !!}
    <p>{!! $revisions->changed_type !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $revisions->created_at !!}</p>
</div>

