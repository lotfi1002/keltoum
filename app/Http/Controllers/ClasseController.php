<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Classe;
use App\Ecole;


class ClasseController extends Controller
{
     public function __construct() {
        $this->middleware(['auth', 'isAdmin']); //isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classes = Classe::join('ecoles', function ($join) {
            $join->on('ecoles.id', '=', 'classes.id_ecole');})->paginate(10); //show only 5 items at a time in 

      //  print_r($classes);
     //   die("");

        return view('classes.index', compact('classes'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ecoles = Ecole::pluck('nom', 'id'); 
        return view('classes.create',compact('ecoles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
            'nom_classe'=>'required',
            'cycle'=>'required',
            'niveau'=>'required',
            ]);

        $nom_classe = $request['nom_classe'];
        $cycle = $request['cycle'];
        $niveau = $request['niveau'];
        $id_ecole = $request['id_ecole'];
       
        $classe = Classe::create(['nom_classe'=>$nom_classe, 'cycle'=>$cycle,'niveau'=>$niveau,'id_ecole'=>$id_ecole]);

    //Display a successful message upon save
        return redirect()->route('classes.index')
            ->with('flash_message', 'Classe,
             '. $classe->nom_classe.' created');    

        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $classe = Classe::findOrFail($id);
          $ecoles = Ecole::pluck('nom', 'id'); 

        return view('classes.edit', compact(['classe', 'ecoles']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom_classe'=>'required',
            ]);

       
         $classe = Classe::findOrFail($id);
        $classe->nom_classe = $request->input('nom_classe');
        $classe->cycle = $request->input('cycle');
        $classe->niveau = $request->input('niveau');
        $classe->id_ecole = $request->input('id_ecole');


       $classe->save();

    //Display a successful message upon save
        return redirect()->route('classes.index', 
            $classe->id)->with('flash_message', 
            'Classe, '. $classe->nom_classe.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
