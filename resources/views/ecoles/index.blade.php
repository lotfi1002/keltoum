@extends('layouts.app')
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
                 Liste des écoles.
            </div>
    <div class="panel-body">
    
  
  
  <div class="row">
                    <div class="panel-heading">Page {{ $ecoles->currentPage() }} of {{ $ecoles->lastPage() }}</div>
                     <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <th>Nom</th>
                                <th>Nom Arabe</th>
                                <th>Raison social</th>
                            
                    @foreach ($ecoles as $ecole)
                       
                            <tr>
                            <td>
                                <a href="{{ route('ecoles.edit', $ecole->id ) }}">{{ $ecole->nom }}

                                </a>
                            </td>
                            <td>
                            {{  $ecole->nom_arabe }} 
                            </td>
                            <td>
                                {{ $ecole->raison_social }}
                            </td>
                            </tr>
                                                             
                     
                    @endforeach
                    </table>  
                    
                    <div class="text-center">
                        {!! $ecoles->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
   <div class="text-center">

            
            <a href="{{ route('ecoles.create') }}">Créer une nouvlle école</a>
                </div>

</div>
       
@endsection