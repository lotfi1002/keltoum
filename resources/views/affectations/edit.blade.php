@extends('layouts.app')

@section('title', '| Créer un nouveau Etudiant')

@section('content')
    <div class="row">
        <div class="col-lg-12">
                    <h1 class="page-header">Gestion des afféctations</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Créer une afféctation
            </div>
    <div class="panel-body">
    <div class="row">

   {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::model($affectation, array('route' => array('affectations.update',$affectation->id) , 'id' => 'form', 'method' => 'PUT')) }}
<div class="col-lg-6">
        <div class="form-group">
       
            
            {{ Form::hidden('id_etudiant',$affectation->id_etudiant) }}
             {{ Form::label('id_classe', 'Classe') }}
            {{ Form::select('id_classe', $classes,'',array('class' => 'form-control')) }}
        </div>
         
         <div class="form-group">    
             
           {{ Form::label('etat', 'Etat') }}
            {{ Form::text('etat', null, array('class' => 'form-control')) }}
        </div>
    </div>
<div class="col-lg-6">

     <div class="form-group">
            {{ Form::label('id_anne', 'Année Academique') }}
            {{ Form::select('id_anne', $annes,'',array('class' => 'form-control')) }}
        </div>
        
        <div class="form-group">
           
            {{ Form::submit('Modifier', array('class' => 'btn btn-default')) }}
        </div>
         
</div>
            {{ Form::close() }}
        </div>
        </div>
    </div>
</div>
</div>
 
@endsection