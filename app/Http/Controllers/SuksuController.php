<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Hobune;
use Storage;

class SuksuController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //hobuse lisamine
    public function lisamine(Request $request){
        $validator = Validator::make($request->all(),[
        'name' => 'required|max:255',
        'omanik' => 'required|max:255',
        'isa' => 'required|max:255',
        'pilt' => 'image|nullable|max:2999'
        ]);
        if($validator->fails()){
            return redirect('/hobused')
            ->withInput()
            ->withErrors($validator);
        }
        if ($request -> hasFile('pilt')){
            $filenameWithExt=$request-> file('pilt')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension=$request-> file('pilt')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('pilt')->storeAs('/public/images/', $fileNameToStore);
        }

        else {
            $fileNameToStore='noimage.png';
        }
        
        $hobune = new Hobune;
        $hobune->name = $request->name;
        $hobune->omanik = $request->omanik;
        $hobune->isa = $request->isa;
        $hobune->pilt = $fileNameToStore;
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
        $hobune = Hobune::find($id);
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
}