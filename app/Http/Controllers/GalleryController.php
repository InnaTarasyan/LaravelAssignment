<?php

namespace App\Http\Controllers;

use App\Image as Gallery;
use Illuminate\Http\Request;
use Image;

class GalleryController extends Controller
{
    public function index(Request $request){

        if($request->isMethod('post')) {
            $data = $request->except('_token');

            if ($request->hasFile('img')) {
                $image = $request->file('img');
                if ($image->isValid()) {
                    $img = Image::make($image);
                    $data['main_image'] = str_random(8).'.jpg';
                    $img->save(public_path().'/'.'/images/gallery/'.$data['main_image']);
                }
            }

           Gallery::create($data);
        }

        if(view()->exists('gallery')){
            $images = Gallery::select('main_image', 'description')->get();
            return view('gallery')
                ->with(['images' => $images]);
        }
        abort(404);


    }
}
