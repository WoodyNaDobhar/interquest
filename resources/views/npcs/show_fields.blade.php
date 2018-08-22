<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $npc->name !!}</p>
</div>

<!-- Private Name Field -->
<div class="form-group">
    {!! Form::label('private_name', 'Private Name:') !!}
    <p>{!! $npc->private_name !!}</p>
</div>

<!-- Image Field -->
<div class="form-group">
    {!! Form::label('image', 'Image:') !!}
    <img src="{!! $npc->likeness != '' ? $npc->likeness : '/img/npc.jpg' !!}" alt="{!! $npc->name !!} Heraldry" width="100%"><br><br>
    <p>{!! $npc->image !!}</p>
</div>

<!-- Vocation Id Field -->
<div class="form-group">
    {!! Form::label('vocation_id', 'Vocation Id:') !!}
    <p>{!! $npc->vocation_id !!}</p>
</div>

<!-- Metatype Id Field -->
<div class="form-group">
    {!! Form::label('metatype_id', 'Metatype Id:') !!}
    <p>{!! $npc->metatype_id !!}</p>
</div>

<!-- Background Public Field -->
<div class="form-group">
    {!! Form::label('background_public', 'Background Public:') !!}
    <p>{!! $npc->background_public !!}</p>
</div>

<!-- Background Private Field -->
<div class="form-group">
    {!! Form::label('background_private', 'Background Private:') !!}
    <p>{!! $npc->background_private !!}</p>
</div>

<!-- Territory Id Field -->
<div class="form-group">
    {!! Form::label('territory_id', 'Territory Id:') !!}
    <p>{!! $npc->territory_id !!}</p>
</div>

<!-- Gold Field -->
<div class="form-group">
    {!! Form::label('gold', 'Gold:') !!}
    <p>{!! $npc->gold !!}</p>
</div>

<!-- Iron Field -->
<div class="form-group">
    {!! Form::label('iron', 'Iron:') !!}
    <p>{!! $npc->iron !!}</p>
</div>

<!-- Timber Field -->
<div class="form-group">
    {!! Form::label('timber', 'Timber:') !!}
    <p>{!! $npc->timber !!}</p>
</div>

<!-- Stone Field -->
<div class="form-group">
    {!! Form::label('stone', 'Stone:') !!}
    <p>{!! $npc->stone !!}</p>
</div>

<!-- Grain Field -->
<div class="form-group">
    {!! Form::label('grain', 'Grain:') !!}
    <p>{!! $npc->grain !!}</p>
</div>

<!-- Action Id Field -->
<div class="form-group">
    {!! Form::label('action_id', 'Action Id:') !!}
    <p>{!! $npc->action_id !!}</p>
</div>

<!-- Deceased Field -->
<div class="form-group">
    {!! Form::label('deceased', 'Deceased:') !!}
    <p>{!! $npc->deceased !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $npc->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $npc->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $npc->deleted_at !!}</p>
</div>

