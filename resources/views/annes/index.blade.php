@extends('layouts.app')
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
                    Liste des années scolaires
            </div>
    <div class="panel-body">
    <div class="row">
                    <div class="panel-heading">Page {{ $annes->currentPage() }} of {{ $annes->lastPage() }}</div>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <th>ID</th>
                                <th>Année Scolaire</th>
                                
                            
                    @foreach ($annes as $anne)
                       
                            <tr>
                            <td>
                                <a href="{{ route('annes.edit', $anne->id ) }}">{{ $anne->id }}

                                </a>
                            </td>
                            <td>
                            {{  $anne->anne }} 
                            </td>
                            
                            </tr>
                                                             
                        
                    @endforeach
                    </table>  
                  
                    <div class="text-center">
                        {!! $annes->links() !!}
                    </div>
                </div>
            </div>
        </div>
      </div>
    </div> 
@endsection