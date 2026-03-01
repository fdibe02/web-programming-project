<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;
use App\Models\Article;


class HomeController extends BaseController{

    public function showHomePage(){

        if(!$user_id = Session::get('user_id')){
            return redirect('auth');
        }

        $articles = Article::orderBy('pub_date', 'desc')->get();

        return view('home')->with('articles', $articles)
                           ->with('user_id', $user_id);
    }

    public function showNews(){
       
        $key = env('NYTNEWS_KEY');
        
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.nytimes.com/svc/mostpopular/v2/viewed/7.json?api-key='.$key);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $news = curl_exec($curl);
        curl_close($curl);

        return $news;
    }

    public function search(Request $query){

        $user_id = Session::get('user_id');

        $articles_searched = Article::where('title', $query->search)->get();

        return view('home')->with('articles', $articles_searched)
                           ->with('user_id', $user_id);
    }

    public function showTopic($topic){

        $user_id = Session::get('user_id');

        $articles_by_topic = Article::where('topic', $topic)->get();

        return view('home')->with('articles', $articles_by_topic )
                           ->with('user_id', $user_id);
    }








    



}