<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Models\Article;

class ArticleController extends BaseController{

    public function showArticle($article_id){

        $article = Article::find($article_id);

        return view('article')->with('article', $article);

    }

    

    
    





    



}