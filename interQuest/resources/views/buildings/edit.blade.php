@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Building
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($buildings, ['route' => ['buildings.update', $buildings->id], 'method' => 'patch']) !!}

                        @include('buildings.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection