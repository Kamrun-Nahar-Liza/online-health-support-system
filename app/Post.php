<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = [

        'user_id', 'category_id', 'title', 'content','status',
    ];


    public function category(){

	return $this->belongsTo(Category::class,'category_id' );
    }

    public function user(){

    	return $this->belongsTo(User::class);

    }
}
