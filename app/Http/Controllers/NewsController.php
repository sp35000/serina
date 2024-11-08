<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::orderBy('id','desc')->paginate(100);
        return view('News.index',['news' => $news]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('News.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        News::create([
            'title' => $request->title,
            'category' => $request->category,
            'link' => $request->link,
            'hashtag' => $request->hashtag,
            'media' => $request->media]);
            //return view('News.show', ['news' => $news]);
            $news = News::orderBy('id','desc')->paginate(100);
            return view('News.index',['news' => $news]);

        }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$news = News::findOrFail($id);
        //return view('News.show', ['news' => $news]);
        $news = News::orderBy('id','desc')->paginate(100);
        return view('News.index',['news' => $news]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('News.edit', ['news' => $news]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $news = News::findOrFail($request->id);
        $news->update([
            'title' => $request->title,
            'category' => $request->category,
            'initial_date' => $request->initial_date,
            'link' => $request->link,
            'hashtag' => $request->hashtag,
            'media' => $request->media]);
            //return view('News.show', ['news' => $news]);
            $news = News::orderBy('id','desc')->paginate(100);
            return view('News.index',['news' => $news]);
        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //dd($request->all());
        $news = News::findOrFail($request->id);
        $news->delete();
        $news = News::orderBy('id','desc')->paginate(100);
        return view('News.index',['news' => $news]);
    }
}
