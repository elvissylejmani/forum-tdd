<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Reply extends Model
{
    use \App\Favoritable;

    protected $fillable = ['thread_id','user_id','body'];

    protected $with = ['owner','favorites'];
    
    public function owner()
    {
            return $this->belongsTo(User::class,'user_id');
    }

   
}
