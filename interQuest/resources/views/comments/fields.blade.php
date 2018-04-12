<!-- Commented Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commented_id', 'Commented Id:') !!}
    {!! Form::number('commented_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Commented Type Field -->
<div class="form-group col-sm-6">
    {!! Form::label('commented_type', 'Commented Type:') !!}
    {!! Form::text('commented_type', null, ['class' => 'form-control']) !!}
</div>

<!-- Author Persona Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('author_persona_id', 'Author Persona Id:') !!}
    {!! Form::number('author_persona_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Subject Field -->
<div class="form-group col-sm-6">
    {!! Form::label('subject', 'Subject:') !!}
    {!! Form::text('subject', null, ['class' => 'form-control']) !!}
</div>

<!-- Message Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('message', 'Message:') !!}
    {!! Form::textarea('message', null, ['class' => 'form-control']) !!}
</div>

<!-- Show Mapkeepers Field -->
<div class="form-group col-sm-6">
    {!! Form::label('show_mapkeepers', 'Show Mapkeepers:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('show_mapkeepers', false) !!}
        {!! Form::checkbox('show_mapkeepers', '1', null) !!} 1
    </label>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('comments.index') !!}" class="btn btn-default">Cancel</a>
</div>
