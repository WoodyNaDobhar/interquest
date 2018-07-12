@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Metatype
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($metatype, ['route' => ['metatypes.update', $metatype->id], 'method' => 'patch']) !!}

                        @include('metatypes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection