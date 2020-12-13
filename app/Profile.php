<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [

        'user_id', 'profile_pic', 'first_name', 'last_name','department','designation','phone',
    ];

    public function user(){

    	return $this->belongsTo(User::class , 'user_id');

    }
}
