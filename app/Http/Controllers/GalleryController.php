<?php

namespace App\Http\Controllers;


use App\Repositories\GalleryRepository;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    protected $g_rep;

    public function __construct(GalleryRepository $g_rep)
    {
        $this->g_rep = $g_rep;
    }

    /**
     * Adds a new image, if the request method is POST, after that returns images.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        if($request->isMethod('post')) {
           $this->g_rep->addImage($request);
        }

        if(view()->exists('gallery')){
            $images = $this->getImages();
            return view('gallery')
                ->with(['images' => $images]);
        }
        abort(404);


    }

    public function getImages(){
        return $this->g_rep->get(['main_image', 'description']);
    }
}
