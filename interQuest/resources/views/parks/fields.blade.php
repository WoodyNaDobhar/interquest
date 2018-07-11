<!-- Orkid Field -->
<div class="form-group col-sm-6">
    {!! Form::label('orkID', 'Orkid:') !!}
    {!! Form::number('orkID', old('orkID'), ['class' => 'form-control']) !!}
</div>

<!-- Rank Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rank', 'Rank:') !!}
    {!! Form::select('rank', [
    	'Shire' => 'Shire', 
    	'Barony' => 'Barony', 
    	'Duchy' => 'Duchy', 
    	'Grand Duchy' => 'Grand Duchy', 
    	'Principality' => 'Principality'
    ], old('rank'), ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
@if(!isset($suppressSave) || $suppressSave === false)
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('parks.index') !!}" class="btn btn-default">Cancel</a>
</div>
@endif