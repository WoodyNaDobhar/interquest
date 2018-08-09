@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Npcs</h1>
        @if(Auth::user()->is_admin || Auth::user()->is_mapkeeper)
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('npcs.create') !!}">Add New</a>
        </h1>
        @endif
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('npcs.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

