@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Race
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($race, ['route' => ['races.update', $race->id], 'method' => 'patch']) !!}

                        @include('races.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection