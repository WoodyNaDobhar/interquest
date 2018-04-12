<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $comments->id !!}</p>
</div>

<!-- Commented Id Field -->
<div class="form-group">
    {!! Form::label('commented_id', 'Commented Id:') !!}
    <p>{!! $comments->commented_id !!}</p>
</div>

<!-- Commented Type Field -->
<div class="form-group">
    {!! Form::label('commented_type', 'Commented Type:') !!}
    <p>{!! $comments->commented_type !!}</p>
</div>

<!-- Author Persona Id Field -->
<div class="form-group">
    {!! Form::label('author_persona_id', 'Author Persona Id:') !!}
    <p>{!! $comments->author_persona_id !!}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $comments->subject !!}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{!! $comments->message !!}</p>
</div>

<!-- Show Mapkeepers Field -->
<div class="form-group">
    {!! Form::label('show_mapkeepers', 'Show Mapkeepers:') !!}
    <p>{!! $comments->show_mapkeepers !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $comments->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $comments->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $comments->deleted_at !!}</p>
</div>

