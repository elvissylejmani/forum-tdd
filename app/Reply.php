<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Reply extends Model
{
    protected $fillable = ['thread_id','user_id','body'];
    public function owner()
    {
            return $this->belongsTo(User::class,'user_id');
    }

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

}
