@extends('layouts.app')

@section('title', '| Créer un nouveau Etudiant')

@section('content')
     <div class="row">
        <div class="col-lg-12">
                    <h1 class="page-header">Gestion des écoles</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Créer une école
            </div>
    <div class="panel-body">
    <div class="row">
    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'ecoles.store' , 'id' => 'form')) }}
<div class="col-lg-6">
        <div class="form-group">
            {{ Form::label('nom', 'Nom') }}
            {{ Form::text('nom', null, array('class' => 'form-control')) }}
            @if ($errors->has('nom'))
                    <span class="text-danger">{{ $errors->first('nom') }}</span>

             @endif
           </div>
            <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::textarea('address', null, array('class' => 'form-control','rows' => 3)) }}
             </div>
           

             <div class="form-group">
           
           
            {{ Form::submit('Créer Ecole', array('class' => 'btn btn-default')) }}
        </div>

           
</div>
<div class="col-lg-6">
 <div class="form-group">
            {{ Form::label('nom_arabe', 'الإسم') }}
            {{ Form::text('nom_arabe', null, array('class' => 'form-control')) }}
             </div>
            <div class="form-group">

            {{ Form::label('address_arabe', 'العنوان') }}
            {{ Form::textarea('address_arabe', null, array('class' => 'form-control','rows' => 3)) }}
            </div>

            <div class="form-group">
             {{ Form::label('raison_social', 'Raison Social') }}
            {{ Form::text('raison_social', null, array('class' => 'form-control')) }}
              </div>
    </div>
            
            {{ Form::close() }}
        </div>
        </div>
    </div>

 
@endsection