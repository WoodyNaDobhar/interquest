{!! Form::open(['route' => ['personae.destroy', $id], 'method' => 'delete']) !!}
<div class='btn-group'>
	<a href="{{ route('personae.show', $id) }}" class='btn btn-default btn-xs'>
		<i class="glyphicon glyphicon-eye-open"></i>
	</a>
	@if(!Auth::guest() && Auth::user()->is_admin)
	<a href="{{ route('personae.edit', $id) }}" class='btn btn-default btn-xs'>
		<i class="glyphicon glyphicon-edit"></i>
	</a>
	{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', [
		'type' => 'submit',
		'class' => 'btn btn-danger btn-xs',
		'onclick' => "return confirm('Are you sure?')"
	]) !!}
	@endif
</div>
{!! Form::close() !!}
