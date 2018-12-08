@extends('layouts.app')
@section('content')
 <div class="row">
    <div class="col-lg-12">
                    <h1 class="page-header">Gestion des  étudiants</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
        
    <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Liste des étudiants
            </div>
    <div class="panel-body">

    {{ Form::open(array('route' => 'etudiants.index' , 'id' => 'form' , 'method' => 'GET')) }}
    <div class="row">
    <div class="col-lg-6">

    <div class="form-group">
            {{ Form::label('firstname', 'Nom') }}
            {{ Form::text('firstname', null, array('class' => 'form-control')) }}
            </div>

    <div class="form-group">

            {{ Form::submit('Chercher', array('class' => 'btn btn-default')) }}
    </div>
</div>
            

    <div class="col-lg-6">


                <div class="form-group">

            {{ Form::label('lastname', 'Prénom') }}
            {{ Form::text('lastname', null, array('class' => 'form-control')) }}
        </div>
    </div>
         
      {{ Form::close() }}   
     </div>
</div>
</div>
</div>
</div>
@if ($etudiants != null && count($etudiants)> 0)

        
 <div class="row">

                <div class="panel panel-default">
                   <!-- <div class="panel-heading"><h3>Etudiants</h3></div> -->
                    <div class="panel-heading">Page {{ $etudiants->currentPage() }} of {{ $etudiants->lastPage() }}</div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>CNE</th>
                                 <th>Afféctations</th>

                            
                    @foreach ($etudiants as $etudiant)
                        <div class="panel-body">
                            <tr>
                            <td>
                                <a href="{{ route('etudiants.edit', $etudiant->id ) }}">{{ $etudiant->firstname }}

                                </a>
                            </td>
                            <td>
                            {{  $etudiant->lastname }} 
                            </td>
                            <td>
                                {{ $etudiant->cne }}
                            </td>

                            <td>
                                <a href="{{ route('affectations.show', $etudiant->id ) }}">Afféctations
                                </a>
                            </td>
                            </tr>
                                                             
                        </div>
                    @endforeach
                    </table>  
                    </div>
                    <div class="text-center">
                        {!! $etudiants->links() !!}
                    
                </div>
       
            @else 

            <div>Pas de résultat trouvé</div>
            @endif
    </div>
    <div class="row">
                                <div class="text-center">

            <a href="{{ route('export.file',['type'=>'xlsx']) }}">Exporter la liste des étudiants (xls)</a> |
            <a href="{{ route('etudiants.create') }}">Créer un nouveau étudiant</a>
                </div>
        </div>
        
@endsection