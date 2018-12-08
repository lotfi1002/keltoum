<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use Auth;
use Session;

class EtudiantController extends Controller
{
   

     public function __construct() {
        $this->middleware(['auth', 'isAdmin']) ;
       // $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $etudiants = null ;

       $dynamic_fields = array_except($request->all(), ['_token']);
// remove columns that have empty values
     
        foreach($dynamic_fields as $key => $value)
        {   
        //$key = key($dynamic_fields) ;
             
            if($value == '')
            {
                unset($dynamic_fields[$key]);
              // $dynamic_fields = array_except($dynamic_fields, $dynamic_fields[$key]);
                //array_splice($dynamic_fields, $index, 1);
               // echo $key." : " ;
            }
           
        }
     

        $etudiants = Etudiant::where($dynamic_fields)->paginate(10);
        /*
        if($request->has("firstname") && $request->has("lastname")){

             $etudiants = Etudiant::where('firstname', 'like', '%'.$request->input('firstname').'%')->where('lastname', 'like', '%'.$request->input('lastname').'%')->paginate(10); //show only 5 items at a time in
       
        } else if($request->has("firstname")){
                 $etudiants = Etudiant::where('firstname', 'like', '%'.$request->input('firstname').'%')->paginate(10); //show only 5 items at a time in
        } else if($request->has("lastname")){
                 $etudiants = Etudiant::where('lastname', 'like', '%'.$request->input('lastname').'%')->paginate(10); //show only 5 items at a time in
        }else{

             $etudiants = Etudiant::orderby('id', 'desc')->paginate(10); //show only 5 items at a time in 

        }
        */
        //descending order

        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('etudiants.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validating title and body field
        $this->validate($request, [
            'firstname'=>'required',
            'lastname'=>'required',
            'cne'=>'required',
            'codemassar'=>'required',
             'email'=>'email',
           
            ]);

        $firstname = $request['firstname'];
        $lastname = $request['lastname'];
        $arabicfirstname = $request['arabicfirstname'];
        $arabiclastname = $request['arabiclastname'];
        $address = $request['address'];
        $arabicaddress = $request['arabicaddress'];
        $cne = $request['cne'];
        $codemassar = $request['codemassar'];
        $datenaissance = $request['datenaissance'];
        $lieunaissance = $request['lieunaissance'];
        $lieunaissancearab = $request['lieunaissancearab'];
        $sexe = $request['sexe'];
        $autre = $request['autre'];
        $datecreation = date('Y-m-d');
        $nompere = $request['nompere'];
        $nommere = $request['nommere'];
        $cinpere = $request['cinpere'];
        $telepere = $request['telepere'];
        $telemere = $request['telemere'];
        $email = $request['email'];
        $isactive = $request['active'];
        $active = false ;
        if(isset($isactive))
            $active = true ;

        $etudiant = Etudiant::create(['firstname'=>$firstname, 'lastname'=>$lastname,'arabicfirstname'=>$arabicfirstname,'arabiclastname'=>$arabiclastname,'address'=>$address,'arabicaddress'=>$arabicaddress,'cne'=>$cne,'codemassar'=>$codemassar,'datenaissance'=>$datenaissance, 'lieunaissance'=>$lieunaissance, 'lieunaissancearab'=>$lieunaissancearab,'sexe'=>$sexe,'autre'=>$autre,'datecreation'=>$datecreation,'nompere'=>$nompere,'nommere'=>$nommere,'cinpere'=>$cinpere,'telepere'=>$telepere,'telemere'=>$telemere,'email'=>$email,'active'=>$active]);

    //Display a successful message upon save
        return redirect()->route('etudiants.index')
            ->with('flash_message', 'Etudiant,
             '. $etudiant->firstname.' created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::findOrFail($id); //Find etudiant of id = $id

        return view ('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $etudiant = Etudiant::findOrFail($id);

        return view('etudiants.edit', compact('etudiant'));
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
            'firstname'=>'required',
            'lastname'=>'required',
            'cne'=>'required',
            'codemassar'=>'required',
            'email'=>'email',
           
            ]);

        $etudiant = Etudiant::findOrFail($id);
        $etudiant->firstname = $request->input('firstname');
        $etudiant->lastname = $request->input('lastname');
        $etudiant->arabicfirstname = $request->input('arabicfirstname');
        $etudiant->arabiclastname = $request->input('arabiclastname');
        $etudiant->address = $request->input('address');
        $etudiant->arabicaddress = $request->input('arabicaddress');
        $etudiant->cne= $request->input('cne');
        $etudiant->codemassar= $request->input('codemassar');
        $etudiant->datenaissance= $request->input('datenaissance');
        $etudiant->lieunaissance= $request->input('lieunaissance');
        $etudiant->lieunaissancearab= $request->input('lieunaissancearab');
        $etudiant->sexe= $request->input('sexe');
        $etudiant->autre= $request->input('autre');
        $etudiant->nompere= $request->input('nompere');
        $etudiant->nommere= $request->input('nommere');
        $etudiant->cinpere= $request->input('cinpere');
        $etudiant->telepere= $request->input('telepere');
        $etudiant->telemere= $request->input('telemere');
        $etudiant->email= $request->input('email');
        $etudiant->active= $request->input('active');
        $etudiant->save();

        return redirect()->route('etudiants.index', 
            $etudiant->id)->with('flash_message', 
            'Etudiant, '. $etudiant->firstname.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')
            ->with('flash_message',
             'Etudiant successfully deleted');
    }
}
