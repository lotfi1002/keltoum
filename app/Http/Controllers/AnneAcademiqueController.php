<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\AnneAcademique;


class AnneAcademiqueController extends Controller
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
         $annes = AnneAcademique::orderby('id', 'desc')->paginate(10); //show only 5 items at a time in 

        

        return view('annes.index', compact('annes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('annes.create');
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
            'anne'=>'required',
            ]);

        $anne = $request['anne'];
        
       
        $anneacademique = AnneAcademique::create(['anne'=>$anne]);

    //Display a successful message upon save
        return redirect()->route('annes.index')
            ->with('flash_message', 'Anne Academique,
             '. $anneacademique->anne.' created'); 
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
         $anne = AnneAcademique::findOrFail($id);

        return view('annes.edit', compact('anne'));
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
            'anne'=>'required',
            ]);


          $anne = AnneAcademique::findOrFail($id);
        $anne->anne = $request->input('anne');
       

        $anne->save();

        return redirect()->route('annes.index', 
            $anne->id)->with('flash_message', 
            'Anne , '. $anne->anne.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $anne = AnneAcademique::findOrFail($id);
        $anne->delete();

        return redirect()->route('annes.index')
            ->with('flash_message',
             'Anne successfully deleted');
    }
}
