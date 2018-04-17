<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $park->id !!}</p>
</div>

<!-- Orkid Field -->
<div class="form-group">
    {!! Form::label('orkID', 'Orkid:') !!}
    <p>{!! $park->orkID !!}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{!! $park->name !!}</p>
</div>

<!-- Rank Field -->
<div class="form-group">
    {!! Form::label('rank', 'Rank:') !!}
    <p>{!! $park->rank !!}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Latitude:') !!}
    {!! $park->lat !!}
</div>

<!-- Lon Field -->
<div class="form-group">
    {!! Form::label('lon', 'Longitude:') !!}
    {!! $park->lon !!}
</div>

<!-- Midreign Field -->
<div class="form-group">
    {!! Form::label('midreign', 'Midreign:') !!}
    <p>{!! $park->midreign !!}</p>
</div>

<!-- Coronation Field -->
<div class="form-group">
    {!! Form::label('coronation', 'Coronation:') !!}
    <p>{!! $park->coronation !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $park->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $park->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $park->deleted_at !!}</p>
</div>

