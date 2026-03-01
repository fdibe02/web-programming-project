<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use App\Models\Article;


class WriteController extends BaseController{

    public function showWrite(){

        if(!Session::get('user_id')){
            return redirect('auth');
        }

        $user = User::find(Session::get('user_id'));

        return view('write')->with('user', $user);

    }

    public function getImage($title){

        $key = env('UNSPLASH_KEY');
        $query = urlencode($title);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.unsplash.com/photos/random?query='.$query.'&orientation=landscape&client_id='.$key);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);

        return $result;
    }

    public function publishArticle(Request $request){

        if(!$user_id = Session::get('user_id')){
            return redirect('auth');
        }

        if(empty($request->content) || empty($request->title)){
            Session::put('error', 'empty_fields');
            return redirect('write');
        }
        

        $article = new Article();
        $article->title = $request->title;
        $article->subtitle = $request->subtitle;
        $article->topic = $request->topic;
        $article->content = $request->content;
        $article->image_src = $request->img;
        $article->author_id = $user_id;
        $article->likes = 0;
        $article->dislikes = 0;
        $article->pub_date = date('Y-m-d H:i:s');
        $article->save();

        return redirect('write');

        }

    





    



}