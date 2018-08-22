<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\NewsRepository;
use App\News;

class NewsController extends Controller
{
    protected $n_rep;

    public function __construct(NewsRepository $n_rep)
    {
        $this->n_rep = $n_rep;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('news')
            ->with(['news' => $this->getNews()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_news');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->n_rep->addNews($request);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect()->route('news.index')->with($result);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
       return view('single_news')
           ->with(['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
       return view('add_news')
           ->with(['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $result = $this->n_rep->updateNews($request, $news);
        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect()->route('news.index')->with($result);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        $result = $this->n_rep->deleteNews($news);

        if(is_array($result) && !empty($result['error'])){
            return back()->with($result);
        }

        return redirect()->route('news.index')->with($result);
    }

    public function getNews(){
        return $this->n_rep->get('*', FALSE, TRUE, FALSE);
    }
}
