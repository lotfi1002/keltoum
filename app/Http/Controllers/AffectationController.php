<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Etudiant;
use App\Classe;
use App\AnneAcademique;
use App\Affectation;


use Auth;
use Session;

class AffectationController extends Controller
{

    public function __construct() {
        $this->middleware(['auth', 'isAdmin']) ;
       // $this->middleware(['auth', 'clearance'])->except('index', 'show');
    }

    /**
     * Display a listing of the resource
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

       $classes = Classe::pluck('nom_classe', 'id'); 
        $annes = AnneAcademique::pluck('anne', 'id'); 
        $message = "";
        $etudiants = null ;
        $id_classe="";
        $id_anne="";

        $id_anne = $request->input('id_anne');
            $id_classe = $request->input('id_classe');


        if(($id_anne!="") && ($id_classe!="")){

            
            $etudiants = Etudiant::join('affectations as a', function ($join) {
            $join->on('etudiants.id', '=', 'a.id_etudiant');})
                ->select('*','etudiants.id as etudiant_id')->where('a.id_classe', '=', $id_classe)->where('a.id_anneacademique', '=', $id_anne)->orderby('etudiants.id', 'desc')->paginate(10);

               // die(print_r($etudiants));

        }

        return view('affectations.index',compact(['etudiants','classes','annes','id','message','id_anne' , 'id_classe']));
    
    }

    /**
     * Show the form for creating a new resource.
     *@param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        
        $classes = Classe::pluck('nom_classe', 'id'); 
        $annes = AnneAcademique::pluck('anne', 'id'); 
        $message = "";
        return view('affectations.create',compact(['classes','annes','id','message']));
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
            'id_etudiant'=>'required',
            'id_classe'=>'required',
            'id_anne'=>'required',
            ]);

        $id_etudiant = $request['id_etudiant'];
        $id_classe = $request['id_classe'];
        $id_anne = $request['id_anne'];
        $etat = "active";

        // controle sur l'affectation
        if (Affectation::where('id_etudiant', '=', $id_etudiant )->where('id_anneacademique', '=', $id_anne )->exists()) {
                 
                 $classes = Classe::pluck('nom_classe', 'id'); 
                 $annes = AnneAcademique::pluck('anne', 'id'); 
                 $etudiant = Etudiant::findOrFail($id_etudiant);
                 $anne = AnneAcademique::findOrFail($id_anne);

                 $message = "l'étudiant ".$etudiant->firstname." ".$etudiant->lastname." est déja affécté à une  classe  pour l'année academique :".$anne->anne;
                 
                 $id = $id_etudiant ;
            
                 return view('affectations.create',compact(['classes','annes','id','message']));  

            }else {
       
                $affectation = Affectation::create(['id_etudiant'=>$id_etudiant, 'id_classe'=>$id_classe,'id_anneacademique'=>$id_anne,'etat'=>$etat]);

            //Display a successful message upon save
                return redirect()->route('affectations.show',$id_etudiant)
                    ->with('flash_message', 'Classe,
                     '. $affectation->id.' created');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $affectations = Affectation::join('etudiants as e', function ($join) {
            $join->on('e.id', '=', 'affectations.id_etudiant');})
                ->select('*','affectations.id as affectation_id')
        ->join('classes as c', 'c.id', '=', 'affectations.id_classe')
        ->join('anne_academiques as a', 'a.id', '=', 'affectations.id_anneacademique')
        ->where('affectations.id_etudiant', '=', $id)->orderby('affectations.id', 'desc')->paginate(10); //show only 5 items at a time in 

      // print_r($affectations);
     // die("");

        return view('affectations.show', compact(['affectations','id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $classes = Classe::pluck('nom_classe', 'id'); 
        $annes = AnneAcademique::pluck('anne', 'id'); 
        $affectation = Affectation::findOrFail($id);
        return view('affectations.edit',compact(['affectation','classes','annes'])); 

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
            'id_etudiant'=>'required',
            'id_classe'=>'required',
            'id_anne'=>'required',
            ]);

        $affectation = Affectation::findOrFail($id);
        $affectation->id_etudiant = $request->input('id_etudiant');
        $affectation->id_classe = $request->input('id_classe');
        $affectation->id_anneacademique = $request->input('id_anne');
        $affectation->etat = $request->input('etat');
        
        $affectation->save();

        return redirect()->route('affectations.show', 
            $affectation->id_etudiant)->with('flash_message', 
            'Affectation, '. $affectation->id.' updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $affetcation = Affectation::findOrFail($id);
         //print_r($affetcation);
         //die("");
         $id_etudiant = $affetcation->id_etudiant ;
         $affetcation->delete();

        return redirect()->route('affectations.show', $id_etudiant)
            ->with('flash_message',
             'Affectation successfully deleted');
    }


     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveaffectations(Request $request)
    {
        $pattern='/affectercheck_[0-9]+/';
        $string = 'affectercheck_';
        $arrayres = array();
        $id_anne = $request->input('id_anne1') ;
        $id_classe = $request->input('id_classe1') ;

        foreach  (   $request->all() as $key=>$value){

             preg_match($pattern, $key, $match);

                  //  
             if(count($match) > 0 ){

                $id = substr($match[0] , strlen ($string), strlen ($match[0]) - strlen ($string) );    
                array_push($arrayres , $id);            
            }


        }

        if(count($arrayres) > 0 ){

                $etat = 'active';
                // affectations

                foreach($arrayres as $value)    {

                  $id_etudiant = $request->input('idetudiant_'.$value) ;

                 // echo "id_etudiant : ".$id_etudiant ." id_classe : ".$id_classe. " id_anne : ".$id_anne ;
                            // teste si l'etudiant est deja affecté ou non 
                            if (!Affectation::where('id_etudiant', '=', $id_etudiant )->where('id_anneacademique', '=', $id_anne )->exists()) {

                                 $affectation = Affectation::create(['id_etudiant'=>$id_etudiant, 'id_classe'=>$id_classe,'id_anneacademique'=>$id_anne,'etat'=>$etat]);
                            }

                }

        }
            return redirect()->route('listaffectations',[$id_anne,$id_classe]);
           // return view('list',compact(['id_anne','id_classe','message']));
       
    }


 /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list($idanne , $idclasse){

        $etudiants = Etudiant::join('affectations as a', function ($join) {
            $join->on('etudiants.id', '=', 'a.id_etudiant');})
                ->select('*','etudiants.id as etudiant_id','a.id as affectation_id')->where('a.id_classe', '=', $idclasse)->where('a.id_anneacademique', '=', $idanne)->orderby('etudiants.id', 'desc')->paginate(10);
        $anne = AnneAcademique::findOrFail($idanne);
        $classe = Classe::findOrFail($idclasse);
       //print_r($affectations);
      //die("");

        return view('affectations.list', compact(['etudiants','anne','classe']));

    }

}
