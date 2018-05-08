@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vocation
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($vocation, ['route' => ['vocations.update', $vocation->id], 'method' => 'patch']) !!}

                        @include('vocations.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection