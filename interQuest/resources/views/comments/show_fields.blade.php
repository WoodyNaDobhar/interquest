<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $comment->id !!}</p>
</div>

<!-- Commented Id Field -->
<div class="form-group">
    {!! Form::label('commented_id', 'Commented Id:') !!}
    <p>{!! $comment->commented_id !!}</p>
</div>

<!-- Commented Type Field -->
<div class="form-group">
    {!! Form::label('commented_type', 'Commented Type:') !!}
    <p>{!! $comment->commented_type !!}</p>
</div>

<!-- Author Persona Id Field -->
<div class="form-group">
    {!! Form::label('author_persona_id', 'Author Persona Id:') !!}
    <p>{!! $comment->author_persona_id !!}</p>
</div>

<!-- Subject Field -->
<div class="form-group">
    {!! Form::label('subject', 'Subject:') !!}
    <p>{!! $comment->subject !!}</p>
</div>

<!-- Message Field -->
<div class="form-group">
    {!! Form::label('message', 'Message:') !!}
    <p>{!! $comment->message !!}</p>
</div>

<!-- Show Mapkeepers Field -->
<div class="form-group">
    {!! Form::label('show_mapkeepers', 'Show Mapkeepers:') !!}
    <p>{!! $comment->show_mapkeepers !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $comment->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $comment->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $comment->deleted_at !!}</p>
</div>

