@extends('layouts.app')
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
                 Classes.
            </div>
    <div class="panel-body">
    <div class="row">

                    <div class="panel-heading">Page {{ $classes->currentPage() }} of {{ $classes->lastPage() }}</div>
                     <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <th>Nom</th>
                                <th>Cycle</th>
                                <th>Niveau</th>
                                <th>Ecole</th>
                            
                    @foreach ($classes as $classe)
                      
                            <tr>
                            <td>
                                <a href="{{ route('classes.edit', $classe->id ) }}">{{ $classe->nom_classe }}

                                </a>
                            </td>
                            <td>
                            {{  $classe->cycle }} 
                            </td>
                            <td>
                                {{ $classe->niveau }}
                            </td>

                            <td>
                                {{ $classe->getOriginal('nom') }}
                            </td>
                            </tr>
                                                             
                       
                    @endforeach
                    </table>  
                   
                    <div class="text-center">
                        {!! $classes->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>  
@endsection