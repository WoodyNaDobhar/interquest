@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fief
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fief, ['route' => ['fiefs.update', $fief->id], 'method' => 'patch']) !!}

                        @include('fiefs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection