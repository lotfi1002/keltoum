@extends('layouts.app')
@section('content')
    
    <div class="row">
    <div class="col-lg-12">
                    <h1 class="page-header">Affectations</h1>
    </div>
                <!-- /.col-lg-12 -->
</div>
        
           <div class="row">
           
                <div class="panel panel-default">
                    
                    <div class="panel-heading">Page {{ $affectations->currentPage() }} of {{ $affectations->lastPage() }}</div>
                   <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <th>Id</th>
                                <th>Nom d'étudiant</th>
                                <th>Classe</th>
                                <th>Anne Scolaire</th>
                                <th>Etat</th>
                                <th>Supprimer</th>
                            
                    @foreach ($affectations as $affetcation)
                        <div class="panel-body">
                            <tr>
                             <td>
                                <a href="{{ route('affectations.edit', $affetcation->affectation_id ) }}">
                                {{ $affetcation->affectation_id }}
                            </a>
                            </td>   
                            <td>
                                {{ $affetcation->firstname }}
                                 {{ $affetcation->lastname }}

                
                            </td>
                            <td>
                            {{  $affetcation->nom_classe }} 
                            </td>
                            <td>
                                {{ $affetcation->anne }}
                            </td>
                             <td>
                                {{ $affetcation->etat }}
                            </td>
                            <td>
                                 <a href="{{ route('deleteaffectation', $affetcation->affectation_id ) }}">Supprimer
                                </a>
                            </td>
                            </tr>
                                                             
                        </div>
                    @endforeach
                    </table>  
                    </div>
                    <div class="text-center">
                        {!! $affectations->links() !!}
                    </div>
                </div>
           
        
 <div class="row">
          <a href="{{ route('createaffectation', $id ) }}">Créer une nouvelle afféctation</a> |
        </div>
@endsection