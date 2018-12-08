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
                  Afféctation par classe et année scolaire
            </div>
    <div class="panel-body">
    
  
  
  <div class="row">
                   {{-- Using the Laravel HTML Form Collective to create our form --}}
                             {{ Form::open(array('route' => 'affectations.index' , 'id' => 'form' , 'method' => 'GET' , 'name'=>"chercher_affectation")) }}
<div class="col-lg-6">
                            <div class="form-group">
                                
                               
                                 {{ Form::label('id_classe', 'Classe') }}
                                {{Form ::select('id_classe', $classes ,['id' => $id_classe],array('class' => 'form-control') ) }}
                            </div>

                             <div class="form-group">

                               
                                {{ Form::submit('Chercher', array('class' => 'btn btn-default' , 'name'=> 'chercher')) }}
                               </div>
  </div>
  <div class="col-lg-6">
                            <div class="form-group">

                                {{ Form::label('id_anne', 'Année Academique') }}
                                {{ Form::select('id_anne', $annes , ['id' => $id_anne] ,array('class' => 'form-control')) }}
                            </div>
  </div>
                          
                     {{ Form::close() }}
                            
    </div> 

<div class="row">


                        @if ($etudiants != null && count($etudiants)> 0)

                          {{-- Using the Laravel HTML Form Collective to create our form --}}
                        {{ Form::open(array('route' => 'saveaffectations' , 'id' => 'form1' ,'name'=>"save_affectation" , 'method' => 'POST')) }}
                         
                            <div class="panel-heading">Page {{ $etudiants->currentPage() }} of {{ $etudiants->lastPage() }}</div>
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <th>Id</th>
                                            <th>Nom </th>
                                            <th>Prénom</th>
                                            <th>Anne de naissance</th>
                                            <th>Affecter</th>
                                @php            
                                  $index =0 
                                @endphp
                                @foreach ($etudiants as $etudiant)
                                        <tr>
                                         <td>
                                           {{ Form::hidden('idetudiant_'.$index, $etudiant->etudiant_id ) }}
                                            {{ $etudiant->etudiant_id }}
                                        
                                        </td>   
                                        <td>
                                            {{ $etudiant->firstname }}
                                
                                        </td>

                                        <td> {{ $etudiant->lastname }}</td>
                                        <td>{{ $etudiant->datenaissance }}</td>
                                       <td>{{ Form::checkbox('affectercheck_'.$index,null, true) }}</td>
                                        </tr>
                                          @php
                                            $index++; 
                                          @endphp                              
                                    
                                @endforeach
                                </table>  
                                
                                <div class="text-center">
                                    {!! $etudiants->links() !!}
                                </div>
                                 
       </div>      

       <div class="row">   
       <div class="col-lg-6">   
       <div class="form-group">                         
                                           
                                            {{ Form::label('id_classe1', 'Classe') }}
                                            {{Form ::select('id_classe1', $classes ,['id' => $id_classe],array('class' => 'form-control')  ) }}
                                </div>

                                  <div class="form-group">       
                                            {{ Form::submit('Affecter', array('class' => 'btn btn-default' , 'name'=> 'affecter')) }}
                                            
                                        </div>
        </div>
        <div class="col-lg-6"> 
                                <div class="form-group">
                                            {{ Form::label('id_anne1', 'Année Academique') }}
                                            {{ Form::select('id_anne1', $annes , ['id' => $id_anne] ,array('class' => 'form-control') ) }}
                                            
                                    </div>
          </div>
                                  
                            {{ Form::close() }}
                        @else 
                        <div>Résultat : 0</div>

                        @endif

                </div>
            </div> 
        </div>
      </div>

         
@endsection