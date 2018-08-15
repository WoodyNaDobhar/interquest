@section('css')
	@include('layouts.datatables_css')
@endsection

{!! isset($dataTable) ? $dataTable->table(['width' => '100%']) : '' !!}

@section('scripts')
	@include('layouts.datatables_js')
	{!! isset($dataTable) ? $dataTable->scripts() : '' !!}
@endsection