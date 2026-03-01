<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $timestamps=false;

    public function articles(){

        return $this->hasMany(Article::class);
    }

    public function likedArticles(){

        return $this->belongsToMany(Article::class, 'liked_articles', 'user_id', 'article_id');
    }

     public function dislikedArticles(){

        return $this->belongsToMany(Article::class, 'disliked_articles', 'user_id', 'article_id');  
    }



    





}