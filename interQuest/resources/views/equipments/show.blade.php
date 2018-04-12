@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Equipments
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('equipments.show_fields')
                    <a href="{!! route('equipments.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
