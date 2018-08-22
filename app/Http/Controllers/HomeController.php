<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Edit the text if request method is POST, alternatively view the text.
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if($request->isMethod('post')) {

        }

        if(view()->exists('index')){
           return view('index');
        }
        abort(404);
    }
}
