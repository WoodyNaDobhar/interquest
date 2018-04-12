<!-- Orkid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orkID', 'Orkid:') !!}
    {!! Form::number('orkID', null, ['class' => 'form-control']) !!}
</div>

<!-- User Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('user_id', 'User Id:') !!}
    {!! Form::number('user_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long_name', 'Long Name:') !!}
    {!! Form::text('long_name', null, ['class' => 'form-control']) !!}
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

<!-- Park Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('park_id', 'Park Id:') !!}
    {!! Form::number('park_id', null, ['class' => 'form-control']) !!}
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

<!-- Is Knight Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_knight', 'Is Knight:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_knight', false) !!}
        {!! Form::checkbox('is_knight', '1', null) !!} 1
    </label>
</div>

<!-- Is Rebel Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_rebel', 'Is Rebel:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_rebel', false) !!}
        {!! Form::checkbox('is_rebel', '1', null) !!} 1
    </label>
</div>

<!-- Is Monarch Field -->
<div class="form-group col-sm-6">
    {!! Form::label('is_monarch', 'Is Monarch:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('is_monarch', false) !!}
        {!! Form::checkbox('is_monarch', '1', null) !!} 1
    </label>
</div>

<!-- Fiefs Assigned Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiefs_assigned', 'Fiefs Assigned:') !!}
    {!! Form::number('fiefs_assigned', null, ['class' => 'form-control']) !!}
</div>

<!-- Shattered Field -->
<div class="form-group col-sm-6">
    {!! Form::label('shattered', 'Shattered:') !!}
    {!! Form::date('shattered', null, ['class' => 'form-control']) !!}
</div>

<!-- Deceased Field -->
<div class="form-group col-sm-6">
    {!! Form::label('deceased', 'Deceased:') !!}
    {!! Form::date('deceased', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('personas.index') !!}" class="btn btn-default">Cancel</a>
</div>
