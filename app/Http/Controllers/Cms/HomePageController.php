<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Content;
class HomePageController extends Controller
{
	public function index(){
		return view('cms.homepage');
	}

    public function slider(Request $request){

    	$slider1 = Content::findOrFail($request->forslider1);
  		$slider2 = Content::findOrFail($request->forslider2);
  		$slider3 = Content::findOrFail($request->forslider3);
  		$slider4 = Content::findOrFail($request->forslider4);


    	if($request->hasFile('Slider1')){
        $image = $request->file('Slider1');
        $fileName = uniqid().time()."_".$image->getClientOriginalName();
        $path = '/images/homepage/';
        $image->move(public_path($path),$fileName);
        $slider1->content = $path.$fileName;
        $slider1->save();
   		 } 

   		 if($request->hasFile('Slider2')){
        $image = $request->file('Slider2');
        $fileName = uniqid().time()."_".$image->getClientOriginalName();
        $path = '/images/homepage/';
        $image->move(public_path($path),$fileName);
        $slider2->content = $path.$fileName;
         $slider2->save();
   		 }
   		 if($request->hasFile('Slider3')){

        $image = $request->file('Slider3');
        $fileName = uniqid().time()."_".$image->getClientOriginalName();
        $path = '/images/homepage/';
        $image->move(public_path($path),$fileName);
        $slider3->content = $path.$fileName;
        $slider3->save();

   		}
   		 if($request->hasFile('Slider4')){

        $image = $request->file('Slider4');
        $fileName = uniqid().time()."_".$image->getClientOriginalName();
        $path = '/images/homepage/';
        $image->move(public_path($path),$fileName);
        $slider4->content = $path.$fileName;
         $slider4->save();
   		 }	 
   		
	}
}