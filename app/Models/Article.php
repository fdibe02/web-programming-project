<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DateTime;



class Article extends Model
{
    public $timestamps=false; 

    public function author(){

        return $this->belongsTo(User::class);

    }

    public function usersByLikes(){

        return $this->belongsToMany(User::class, 'liked_articles', 'article_id', 'user_id');
    }

    public function usersByDislikes(){

        return $this->belongsToMany(User::class, 'disliked_articles', 'article_id', 'user_id');
    }

    public function checkIfIsLiked(User $user){

        return $this->belongsTo($user);
    }

    public function formatDate(){

        $date = new DateTime($this->pub_date);

        $day = $date->format('j');
        $month = $date->format('F');

        return "$month, $day";
    }


    
    

}