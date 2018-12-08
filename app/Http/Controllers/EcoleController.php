<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\Ecole;

class EcoleController extends Controller
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
        $ecoles = Ecole::orderby('id', 'desc')->paginate(10); //show only 5 items at a time in 

        

        return view('ecoles.index', compact('ecoles'));
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('ecoles.create');
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
            'nom'=>'required',
            ]);

        $nom = $request['nom'];
        $nom_arabe = $request['nom_arabe'];
        $address = $request['address'];
        $address_arabe = $request['address_arabe'];
        $raison_social = $request['raison_social'];
       
        $ecole = Ecole::create(['nom'=>$nom, 'nom_arabe'=>$nom_arabe,'address'=>$address,'address_arabe'=>$address_arabe,'raison_social'=>$raison_social]);

    //Display a successful message upon save
        return redirect()->route('ecoles.index')
            ->with('flash_message', 'Ecole,
             '. $ecole->nom.' created');    }

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
         $ecole = Ecole::findOrFail($id);

        return view('ecoles.edit', compact('ecole'));
    
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
            'nom'=>'required',
            ]);


          $ecole = Ecole::findOrFail($id);
        $ecole->nom = $request->input('nom');
        $ecole->nom_arabe = $request->input('nom_arabe');
        $ecole->address = $request->input('address');
        $ecole->address_arabe = $request->input('address_arabe');

        $ecole->raison_social = $request->input('raison_social');

        $ecole->save();

        return redirect()->route('ecoles.index', 
            $ecole->id)->with('flash_message', 
            'Ecole, '. $ecole->nom.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ecole = Ecole::findOrFail($id);
        $ecole->delete();

        return redirect()->route('ecoles.index')
            ->with('flash_message',
             'Ecole successfully deleted');

    }
}
