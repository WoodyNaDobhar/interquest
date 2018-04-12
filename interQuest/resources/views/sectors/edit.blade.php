@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Sectors
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($sectors, ['route' => ['sectors.update', $sectors->id], 'method' => 'patch']) !!}

                        @include('sectors.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection