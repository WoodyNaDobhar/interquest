@extends('personae.show_fields')
@section('imageCollective')
			<img class="personaImage {!! $persona->is_rebel ? 'rebel' : '' !!}" src="{!! $persona->likeness !!}">
			@if($persona->is_knight)
			<img class="overlayKnight" src="/img/overlay{!! $persona->vocation->id == 4 ? 'Paladin' : ($persona->vocation->id == 5 ? 'AntiPaladin' : 'SudoPaladin') !!}.png">
			@endif
			@if($persona->is_monarch)
			<img class="overlayMonarch" src="/img/overlayMonarch.png">
			@endif
			@if($persona->user->is_mapkeeper)
			<img class="overlayMapkeeper" src="/img/overlayMapkeeper.png">
			@endif
			@if($persona->deceased)
			<img class="overlayDeceased" src="/img/overlayDeceased.png">
			@endif
@endsection