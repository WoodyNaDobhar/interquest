<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Private Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('private_name', 'Private Name:') !!}
    {!! Form::text('private_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::text('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Vocation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vocation_id', 'Vocation Id:') !!}
    {!! Form::number('vocation_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Race Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('race_id', 'Race Id:') !!}
    {!! Form::number('race_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Public Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('background_public', 'Background Public:') !!}
    {!! Form::textarea('background_public', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Private Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('background_private', 'Background Private:') !!}
    {!! Form::textarea('background_private', null, ['class' => 'form-control']) !!}
</div>

<!-- Territory Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('territory_id', 'Territory Id:') !!}
    {!! Form::number('territory_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Gold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gold', 'Gold:') !!}
    {!! Form::number('gold', null, ['class' => 'form-control']) !!}
</div>

<!-- Iron Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iron', 'Iron:') !!}
    {!! Form::number('iron', null, ['class' => 'form-control']) !!}
</div>

<!-- Timber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timber', 'Timber:') !!}
    {!! Form::number('timber', null, ['class' => 'form-control']) !!}
</div>

<!-- Stone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stone', 'Stone:') !!}
    {!! Form::number('stone', null, ['class' => 'form-control']) !!}
</div>

<!-- Grain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grain', 'Grain:') !!}
    {!! Form::number('grain', null, ['class' => 'form-control']) !!}
</div>

<!-- Action Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('action_id', 'Action Id:') !!}
    {!! Form::number('action_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Deceased Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deceased', 'Deceased:') !!}
    {!! Form::date('deceased', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('npcs.index') !!}" class="btn btn-default">Cancel</a>
</div>
