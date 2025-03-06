<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use App\Models\User;

class Post extends Model
{
    use HasFactory;
        protected $guarded = [];

        public function category()
        {
            return $this->belongsTo(Category::class);
        }
        public function user()
        {
            return $this->belongsTo(User::class);
        }
        public function partner()
        {
            return $this->belongsTo(User::class);
        }

        public function likes()
        {
            return $this->hasMany(Like::class);
        }
    
        /**
         * Define the one-to-many relationship with dislikes.
         */
        public function dislikes()
        {
            return $this->hasMany(Dislike::class);
        }
    
        /**
         * Helper method to count likes.
         */
        public function likesCount()
        {
            return $this->likes()->count();
        }
    
        /**
         * Helper method to count dislikes.
         */
        public function dislikesCount()
        {
            return $this->dislikes()->count();
        }
    }