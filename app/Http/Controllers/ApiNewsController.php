<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiNewsController extends Controller
{
  /**
   * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search($hashtag)
    {
      $news = News::where('title', 'LIKE', '%' . $hashtag . '%')
                  ->orWhere('link', 'LIKE', '%' . $hashtag . '%')
                  ->orWhere('hashtag', 'LIKE', '%' . $hashtag . '%')
                  ->orderBy('initial_date','desc')
                  ->get();
      return json_encode($news);
    }

   /**
   * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category($category)
    {
      $news = News::where('category', '=', $category)->orderBy('initial_date','desc')->take(200)->get();
      return json_encode($news);
    }

    /**
     * Display the specified resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function date($date)
      {
        $news = News::where('initial_date', '=', $date)->get();
        return json_encode($news);
      }

    /**
     * Display the specified resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function month($month)
      {
        $news = News::where('initial_date', 'LIKE', '%' . $month . '%')->get();
        return json_encode($news);
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
        $news = News::orderBy('id','desc')->take(100)->get();
        return json_encode($news);
    }
}
