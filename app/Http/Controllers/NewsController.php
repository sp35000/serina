<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::latest()->paginate(5);

        return view('news.index', compact('news'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);

        News::create($request->all());

        return redirect()->route('news.index')
            ->with('success', 'News created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function show(News $new)
    {
        return view('news.show', compact('new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function edit(News $new)
    {
        return view('news.edit', compact('new'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\new  $new
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $new)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required'
        ]);
        $new->update($request->all());

        return redirect()->route('news.index')
            ->with('success', 'News updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $new
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $new)
    {
        $new->delete();

        return redirect()->route('news.index')
            ->with('success', 'News deleted successfully');
    }
}