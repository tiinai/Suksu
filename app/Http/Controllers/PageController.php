<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Hobune;

class PageController extends Controller
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

    
    //Hobuse andmete kuvamine
    public function suksu($id){
        $hobuneobj = Hobune::find($id);
        return view('hobune', ['hobune' =>$hobuneobj]);
    }
    
}
