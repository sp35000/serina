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
      $news = News::where('in_logical_deletion','=',0)
            ->where(function ($query) use ($hashtag) {
                      $query->where('title', 'LIKE', '%' . $hashtag . '%')
                      ->orWhere('link', 'LIKE', '%' . $hashtag . '%')
                      ->orWhere('hashtag', 'LIKE', '%' . $hashtag . '%');
            })
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
      $news = News::where('category', '=', $category)->where('in_logical_deletion','=',0)->orderBy('initial_date','desc')->take(200)->get();
      return json_encode($news);
    }

    /**
     * Display the specified resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function date($date)
      {
        $news = News::where('initial_date', '=', $date)->where('in_logical_deletion','=',0)->orderBy('id','desc')->get();
        return json_encode($news);
      }

    /**
     * Display the specified resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function month($month)
      {
        $news = News::where('initial_date', 'LIKE', '%' . $month . '%')->where('in_logical_deletion','=',0)->get();
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
        $news = News::orderBy('id','desc')->where('in_logical_deletion','=',0)->take(100)->get();
        return json_encode($news);
    }
}
