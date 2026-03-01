<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class ProfileController extends BaseController{

    public function showProfile(){

        if(!$user_id = Session::get('user_id')){
            return redirect('auth');
        }

        $user = User::find($user_id);

        return view('profile')->with('user', $user);

    }

    public function addLike(Request $request){

        if(!$user_id = Session::get('user_id')){
            return redirect('auth');
        }

       DB::table("liked_articles")->insert([
                'user_id' => $user_id,
                'article_id' => $request->card_id,
                'add_date' => date('Y-m-d H:i:s')
        ]);
        
        return json_encode('ok');
    }

    public function removeLike(Request $request){

        if(!$user_id = Session::get('user_id')){
            return redirect('auth');
        }
        
        DB::table("liked_articles")
            ->where("user_id", $user_id)
            ->where("article_id", $request->card_id)
            ->delete();

        return json_encode('ok');
        
    }

    public function showLikedArticles(){

        if(!$user_id = Session::get('user_id')){
            return [];
        }

        $user = User::find($user_id);

        return $user->LikedArticles()->orderBy('add_date', 'desc')->get();
    }

    public function addDislike(Request $request){

        if(!$user_id = Session::get('user_id')){
            return redirect('auth');
        }

        DB::table("disliked_articles")->insert([
                'user_id' => $user_id,
                'article_id' => $request->card_id
        ]);

        return json_encode('ok');
    }

    





    



}