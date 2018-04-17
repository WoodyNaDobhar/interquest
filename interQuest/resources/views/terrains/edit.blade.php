@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Terrain
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($terrains, ['route' => ['terrains.update', $terrains->id], 'method' => 'patch']) !!}

                        @include('terrains.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection