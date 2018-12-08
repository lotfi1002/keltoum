 @extends('layouts.app')
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
                 List d'affectation par année académique: {{$anne->anne}} et classe : {{$classe->nom_classe}}.
            </div>
    <div class="panel-body">
    
  
  
  <div class="row">


                        @if ($etudiants != null && count($etudiants)> 0)

                           
                            <div class="panel-heading">Page {{ $etudiants->currentPage() }} of {{ $etudiants->lastPage() }}</div>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <th>Id</th>
                                            <th>Nom </th>
                                            <th>Prénom</th>
                                            <th>Anne de naissance</th>
                                            <th>Supptimer</th>
                                           
                               
                                @foreach ($etudiants as $etudiant)
                                        <tr>
                                         <td>
                                            {{ $etudiant->etudiant_id }}
                                        
                                        </td>   
                                        <td>
                                            {{ $etudiant->firstname }}
                                
                                        </td>

                                        <td> {{ $etudiant->lastname }}</td>
                                        <td>{{ $etudiant->datenaissance }}</td>
                                       <td>
										<a href="{{ route('deleteaffectation', $etudiant->affectation_id ) }}">Supprimer </a></td>
                                        </tr>
                                                                      
                                    
                                @endforeach
                                </table>  
                                
                                <div class="text-center">
                                    {!! $etudiants->links() !!}
                                </div>
                                 
                        @else 
                        <div>Résultat : 0</div>

                        @endif

                </div>
            </div> 
        </div>
</div>
</div>
         
@endsection