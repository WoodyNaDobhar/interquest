@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Npc
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($npcs, ['route' => ['npcs.update', $npcs->id], 'method' => 'patch']) !!}

                        @include('npcs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection