@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Action
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($action, ['route' => ['actions.update', $action->id], 'method' => 'patch']) !!}

                        @include('actions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection