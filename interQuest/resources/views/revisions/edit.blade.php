@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Revisions
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($revisions, ['route' => ['revisions.update', $revisions->id], 'method' => 'patch']) !!}

                        @include('revisions.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection