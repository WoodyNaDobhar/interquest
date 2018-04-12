@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fieves
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fieves, ['route' => ['fieves.update', $fieves->id], 'method' => 'patch']) !!}

                        @include('fieves.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection