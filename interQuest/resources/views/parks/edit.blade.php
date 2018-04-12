@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Parks
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($parks, ['route' => ['parks.update', $parks->id], 'method' => 'patch']) !!}

                        @include('parks.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection