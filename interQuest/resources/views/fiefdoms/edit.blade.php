@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Fiefdom
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($fiefdom, ['route' => ['fiefdoms.update', $fiefdom->id], 'method' => 'patch']) !!}

                        @include('fiefdoms.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection