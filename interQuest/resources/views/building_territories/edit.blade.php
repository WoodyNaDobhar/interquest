@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Building Territory
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($buildingTerritory, ['route' => ['buildingTerritories.update', $buildingTerritory->id], 'method' => 'patch']) !!}

                        @include('building_territories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection