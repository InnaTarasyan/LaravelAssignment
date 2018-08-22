<?php

namespace App\Http\Controllers;

use App\MainInfo;
use App\Repositories\HomeRepository;
use Illuminate\Http\Request;
use Redirect;

class HomeController extends Controller
{
    protected $h_rep;

    public function __construct(HomeRepository $h_rep)
    {
        $this->h_rep = $h_rep;
    }

    /**
     * Returns the Text
     *
     * @param  Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){

        if(view()->exists('index')){

           return view('index')
               ->withText($this->getText());
        }
        abort(404);
    }

    public function getText(){
        return $this->h_rep->one(1);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $result = $this->h_rep->addText($request);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return Redirect::to('/')->with($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request){
        $old_value = $this->getText();
        $result = $this->h_rep->editText($request, $old_value);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return Redirect::to('/')->with($result);

    }
}
