<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class Thread extends Model
{
    use \App\RecordsActivity;

    protected $fillable = ['user_id','channel_id','title','body'];
    
    protected $with = ['creator','channel'];


    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('replyCount',function ($builder){
            $builder->withCount('replies');
        });

      
      static::deleting(function ($thread){
        $thread->replies()->each(function ($reply){
            $reply->delete();
        });
      });
    }
    
    public function path()
    {
        return '/threads/' . $this->channel->slug . '/' . $this->id;
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function creator()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function addReply($reply)
    {
        $this->replies()->create($reply);
    }
    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }
    public function scopeFilter($qurey, $filters)
    {
        // dd($filters);
        return $filters->apply($qurey);
    }
}
