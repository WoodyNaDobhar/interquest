@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Title
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($titles, ['route' => ['titles.update', $titles->id], 'method' => 'patch']) !!}

                        @include('titles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection