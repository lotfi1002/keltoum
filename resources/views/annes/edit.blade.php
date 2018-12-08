@extends('layouts.app')

@section('title', '| Créer une nouvelle  année scoliare')

@section('content')
     <div class="row">
        <div class="col-lg-12">
                    <h1 class="page-header">Gestion des années scolaires</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

 <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                    Modifier une année scolaire
            </div>
    <div class="panel-body">
    <div class="row">

    {{-- Using the Laravel HTML Form Collective to create our form --}}
        {{ Form::model($anne, array('route' => array('annes.update',$anne->id) , 'id' => 'form', 'method' => 'PUT')) }}

        <div class="form-group">
            {{ Form::label('anne', 'Année Scoliare') }}
            {{ Form::text('anne', null, array('class' => 'form-control')) }}
            @if ($errors->has('anne'))
                    <span class="text-danger">{{ $errors->first('anne') }}</span>

             @endif
           </div>
            <div class="form-group">
           
            {{ Form::submit('Modifier Année', array('class' => 'btn btn-default')) }}
        </div>
            {{ Form::close() }}
        </div>
        </div>
    </div>
</div>
</div>
 
@endsection