<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use Image;

class ImageController extends Controller
{
    public function resizeImage()
    {
    	return view('resizeImage');
    }
        public function resizeImagePost(Request $request)
    {
	    $this->validate($request, [
            'pilt' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('pilt');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->getRealPath());
        $img->resize(100, 100, function ($constraint) {
		    $constraint->aspectRatio();
		})->save($destinationPath.'/'.$input['imagename']);
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);
        $this->postImage->add($input);
        return back()
        	->with('success','Image Upload successful')
        	->with('imageName',$input['imagename']);
    }



}
