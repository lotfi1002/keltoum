@extends('layouts.app')

@section('title', '| Créer un nouveau Etudiant')

@section('content')
 <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestion des Etudiants</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Ajouter un étudiant
            </div>
    <div class="panel-body">
    <div class="row">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::open(array('route' => 'etudiants.store' , 'id' => 'form')) }}    
    <div class="col-lg-6">
         <div class="form-group">
            {{ Form::label('firstname', 'Nom') }}
            {{ Form::text('firstname', null, array('class' => 'form-control')) }}
            @if ($errors->has('firstname'))
                    <span class="text-danger">{{ $errors->first('firstname') }}</span>

             @endif
         </div>
            
            <div class="form-group"> 
            {{ Form::label('arabicfirstname', 'الإسم') }}
            {{ Form::text('arabicfirstname', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
            {{ Form::label('address', 'Address') }}
            {{ Form::textarea('address', null, array('class' => 'form-control','rows' => 3)) }}
            </div>
        
            <div class="form-group">
             {{ Form::label('cne', 'cne') }}
            {{ Form::text('cne', null, array('class' => 'form-control')) }}
             @if ($errors->has('cne'))
                    <span class="text-danger">{{ $errors->first('cne') }}</span>

             @endif
           
            </div>
           
            <div class="form-group">
             {{ Form::label('datenaissance', 'Date de naissance') }}
            {{ Form::date('datenaissance', null, array('class' => 'form-control')) }}
            </div>
            <div class="form-group">
            
             {{ Form::label('lieunaissance', 'Lieu de naissance') }}
            {{ Form::text('lieunaissance', null, array('class' => 'form-control')) }}
            </div>
           
            <div class="form-group">
             {{ Form::label('nompere', 'Nom du pére') }}
            {{ Form::text('nompere', null, array('class' => 'form-control')) }}
            </div>
           
            <div class="form-group">
             {{ Form::label('telepere', 'Téléphone du pére') }}
            {{ Form::text('telepere', null, array('class' => 'form-control')) }}
            </div>
           
            <div class="form-group">
             {{ Form::label('cinpere', 'Cin du pére') }}
            {{ Form::text('cinpere', null, array('class' => 'form-control')) }}
            </div> 
            
            <div class="form-group">
            {{ Form::label('autre', 'Autre') }}
            {{ Form::textarea('autre', null, array('class' => 'form-control','rows' => 3)) }}
            </div>
            
            <div class="form-group">
            {{ Form::submit('Créer Etudiant', array('class' => 'btn btn-default')) }}
            
            </div>
        </div>
        
    <div class="col-lg-6">
        
        <div class="form-group">  

            {{ Form::label('lastname', 'Prénom') }}
            {{ Form::text('lastname', null, array('class' => 'form-control')) }}
             @if ($errors->has('lastname'))
                    <span class="text-danger">{{ $errors->first('lastname') }}</span>

             @endif
            </div>

        <div class="form-group">

            {{ Form::label('arabiclastname', 'النسب') }}
            {{ Form::text('arabiclastname', null, array('class' => 'form-control')) }}
        </div>

         <div class="form-group">

            {{ Form::label('arabicaddress', 'العنوان') }}
            {{ Form::textarea('arabicaddress', null, array('class' => 'form-control','rows' => 3)) }}
        </div>
        
         <div class="form-group">
             {{ Form::label('codemassar', 'Code Massar') }}
            {{ Form::text('codemassar', null, array('class' => 'form-control')) }}
             @if ($errors->has('codemassar'))
                    <span class="text-danger">{{ $errors->first('codemassar') }}</span>

             @endif
           
            </div>


            <div class="form-group">
            {{ Form::label('sexe', 'Sexe') }}
            {{ Form::text('sexe', null, array('class' => 'form-control')) }}
            </div>

             <div class="form-group">
             {{ Form::label('lieunaissancearab', 'مكان الإزدياد') }}
            {{ Form::text('lieunaissancearab', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
             {{ Form::label('nommere', 'Nom du mére') }}
            {{ Form::text('nommere', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
             {{ Form::label('telemere', 'Téléphone du mére') }}
            {{ Form::text('telemere', null, array('class' => 'form-control')) }}
            </div>

            <div class="form-group">
             {{ Form::label('email', 'Email') }}
            {{ Form::email('email', null , array('class' => 'form-control')) }}
             @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>

             @endif
            </div>

            <div class="form-group">
             {{ Form::label('active', 'Active') }}
            {{ Form::checkbox('active', null, true) }}
            </div>
           
    </div>
    {{ Form::close() }}
        </div>
    
    </div>
    </div>
    </div>
    </div>

 
@endsection