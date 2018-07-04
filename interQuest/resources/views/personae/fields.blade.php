<?php if(!isset($persona) || $persona->validClaim != 'claimed'){ ?>

<!-- Email Field -->
<div class="form-group col-sm-6">
    {!! Form::label('validClaim', 'User Facebook Email:') !!}
    {!! Form::text('validClaim', null, ['class' => 'form-control']) !!}
</div>

<?php if(!isset($persona)){ ?>

<!-- Email Instructions Field -->
<div class="form-group col-sm-6">
    If you know, or can get, the email address the Persona's user signed up to Facebook with, we can verify them later and let them take control over some of their more superficial details (name, background, image, etc).  You can invite them later with a convenient button when you get that email address from them.  Not required.
</div>

<?php }else{ ?>

<!-- Invite Field -->
<div class="form-group col-sm-6">
    <a class="btn btn-primary pull-right invitePersona" data-persona_id="{!!$persona->id!!}">Send Claim Invite</a>
</div>
<div class="form-group col-sm-6">
	&nbsp;
</div>

<?php } ?>

<?php } ?>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Common Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Long Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('long_name', 'Long Name:') !!}
    {!! Form::text('long_name', null, ['class' => 'form-control']) !!}
</div>

<!-- Orkid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orkID', 'Persona ORK Id:') !!}
    {!! Form::number('orkID', null, ['class' => 'form-control', 'placeholder' => 'https://amtgard.com/ork/orkui/?Route=Player/index/XXXX <- this last number']) !!}
</div>

<!-- Race Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('race_id', 'Metatype:') !!}
    {!! Form::select('race_id', $races, null, ['class' => 'form-control']) !!}
</div>

<!-- Vocation Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('vocation_id', 'Declared Class:') !!}
    {!! Form::select('vocation_id', $vocations, null, ['class' => 'form-control']) !!}
</div>

<!-- Image Field -->
<div class="form-group col-sm-6">
    {!! Form::label('image', 'Image:') !!}
    {!! Form::file('image', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Public Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('background_public', 'Publicly Known Background:') !!}
    {!! Form::textarea('background_public', null, ['class' => 'form-control']) !!}
</div>

<!-- Background Private Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('background_private', 'Private Background Details:') !!}
    {!! Form::textarea('background_private', null, ['class' => 'form-control']) !!}
</div>

<!-- Park Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('park_id', 'Home Park:') !!}
    {!! Form::select('park_id', $parks, null, ['class' => 'form-control']) !!}
</div>

<!-- Action Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('action_id', 'Default Action:') !!}
    {!! Form::select('action_id', $actions, null, ['class' => 'form-control']) !!}
</div>

<!-- Gold Field -->
<div class="form-group col-sm-6">
    {!! Form::label('gold', 'Gold On Persona:') !!}
    {!! Form::number('gold', isset($persona) ? $persona->gold->persona->total : null, ['class' => 'form-control']) !!}
</div>

<!-- Iron Field -->
<div class="form-group col-sm-6">
    {!! Form::label('iron', 'Iron On Persona:') !!}
    {!! Form::number('iron', isset($persona) ? $persona->iron->persona->total : null, ['class' => 'form-control']) !!}
</div>

<!-- Timber Field -->
<div class="form-group col-sm-6">
    {!! Form::label('timber', 'Timber On Persona:') !!}
    {!! Form::number('timber', isset($persona) ? $persona->timber->persona->total : null, ['class' => 'form-control']) !!}
</div>

<!-- Stone Field -->
<div class="form-group col-sm-6">
    {!! Form::label('stone', 'Stone On Persona:') !!}
    {!! Form::number('stone', isset($persona) ? $persona->stone->persona->total : null, ['class' => 'form-control']) !!}
</div>

<!-- Grain Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grain', 'Grain On Persona:') !!}
    {!! Form::number('grain', isset($persona) ? $persona->grain->persona->total : null, ['class' => 'form-control']) !!}
</div>

<!-- Fiefs Assigned Field -->
<div class="form-group col-sm-6">
    {!! Form::label('fiefs_assigned', 'Fiefs Assigned:') !!}
    {!! Form::number('fiefs_assigned', null, ['class' => 'form-control']) !!}
</div>

<!-- Is Knight Field -->
<div class="form-group col-sm-offset-1 col-sm-4">
    {!! Form::label('is_knight', 'Is Knight:') !!}
    <label>
        {!! Form::hidden('is_knight', false) !!}
        {!! Form::checkbox('is_knight', '1', null) !!}
    </label>
</div>

<!-- Is Rebel Field -->
<div class="form-group col-sm-4">
    {!! Form::label('is_rebel', 'Is Rebel:') !!}
    <label>
        {!! Form::hidden('is_rebel', false) !!}
        {!! Form::checkbox('is_rebel', '1', null) !!}
    </label>
</div>

<!-- Is Monarch Field -->
<div class="form-group col-sm-3">
    {!! Form::label('is_monarch', 'Is Monarch:') !!}
    <label>
        {!! Form::hidden('is_monarch', false) !!}
        {!! Form::checkbox('is_monarch', '1', null) !!}
    </label>
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
    <a href="{!! route('personae.index') !!}" class="btn btn-default">Cancel</a>
</div>
