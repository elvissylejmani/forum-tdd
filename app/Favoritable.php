<?php


namespace App;
use App\Favorite;

trait Favoritable 
{
    public function favorites()
    {
        return $this->MorphMany(Favorite::class,'favorited');
    }
    public function favorite()
    {
        $attributes = ['user_id' => auth()->user()->id];
        if (! $this->favorites()->where($attributes)->exists()) {
            return $this->favorites()->create($attributes);
        }
    }

    public function isFavorited()
    {
        return  !! $this->favorites->where('user_id',auth()->user()->id)->count();
    }


    public function getFavoritesCountAttribute()
    {
        return $this->favorites->count();
    }
    
}