<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){

        $images = News::select('main_image', 'description')->get();
        return view('gallery')
            ->with(['images' => $images]);
    }
}
