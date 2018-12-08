@extends('layouts.app')

@section('title', '| Créer une nouvelle Classe')

@section('content')
     <div class="row">
        <div class="col-lg-12">
                    <h1 class="page-header">Gestion des classes</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Créer une classe
            </div>
    <div class="panel-body">
    <div class="row">
    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'classes.store' , 'id' => 'form')) }}
<div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('nom_classe', 'Nom') }}
            {{ Form::text('nom_classe', null, array('class' => 'form-control')) }}
            @if ($errors->has('nom_classe'))
                    <span class="text-danger">{{ $errors->first('nom_classe') }}</span>

             @endif
           </div>
             <div class="form-group">
            {{ Form::label('cycle', 'Cycle') }}
            {{ Form::text('cycle', null, array('class' => 'form-control')) }}
             </div>

              {{ Form::submit('Creer Classe', array('class' => 'btn btn-default')) }}
</div>
<div class="col-lg-6">
             <div class="form-group">

            {{ Form::label('niveau', 'Niveau') }}
            {{ Form::text('niveau', null, array('class' => 'form-control')) }}
             </div>
             <div class="form-group">

             {{ Form::label('id_ecole', 'Ecole') }}
            {{ Form::select('id_ecole', $ecoles, null, array('class' => 'form-control')) }}
             </div>
             <div class="form-group">
 </div>

     </div>      
            {{ Form::close() }}
        </div>
        </div>
    </div>

 
@endsection