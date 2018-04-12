@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Actions
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($actions, ['route' => ['actions.update', $actions->id], 'method' => 'patch']) !!}

                        @include('actions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection