<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Hobune;

class SuksuController extends Controller
{

    //lehekülje Meist kuvamine
    public function meist(){
        return view ('meist');
    }
        
    /// hobuste nimekirja kuvamine
    public function suksulist(Request $request){
        $hobused = hobune::orderBy('name','asc')->get();
        return view('hobused', ['hobused'=> $hobused]);
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
    //hobuse lisamine
    public function lisamine(Request $request){
        $validator = Validator::make($request->all(),[
        'name' => 'required|max:255',
        'omanik' => 'required|max:255',
        ]);
        if($validator->fails()){
            return redirect('/hobused')
            ->withInput()
            ->withErrors($validator);
        }
        $hobune = new Hobune;
        $hobune->name = $request->name;
        $hobune->omanik = $request->omanik;
        $hobune->save();
        
        return redirect('/hobused')->with('success', 'Hobune lisatud');
    }
    //Hobuse andmete kuvamine
    public function suksu($id){
        $hobuneobj = Hobune::find($id);
        return view('hobune', ['hobune' =>$hobuneobj]);
    }
    
    //hobuse andmete muutmine
    public function muutmine($id){
        $hobuneobj = Hobune::find($id);
        return view ('edit', ['hobune' =>$hobuneobj]);
    }
    
    public function varskenda(Request $request, $id){
        $validator = Validator::make($request->all(),[
        'name' => 'required|max:255',
        'omanik' => 'required|max:255',
        ]);
        if($validator->fails()){
            return redirect('/hobused')
            ->withInput()
            ->withErrors($validator);
        }
        $hobune = Hobune;
        $hobune->name = $request->name;
        $hobune->omanik = $request->omanik;
        $hobune->save();
        
        return redirect('/hobused')->with('success', 'Hobuse andmed muudetud');
    }
    // hobuse kustutamine
    
    public function kustutamine($id)
    {
        $hobune= Hobune::find($id);
        $hobune->delete();
        return redirect('/hobused');
    }
//    public function kustutamine ($hobune){
  //    $hobune->delete();
    //  return redirect('/hobused');
    //}
  // public function kustutamine(Hobune $hobune){
//       $hobune->delete();
 //      return redirect('/hobused');
  // }
//   public function delete($id){
//       return redirect('/hobused');
//   }
}
