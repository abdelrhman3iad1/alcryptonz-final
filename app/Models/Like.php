<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User; 
use App\Models\Post; 

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Define the inverse relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Define the inverse relationship with the Post model.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}