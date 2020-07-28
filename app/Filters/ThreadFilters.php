<?php

namespace App\Filters;


use App\User;

class  ThreadFilters extends Filters{ 

    protected $fillters = ['by','popular'];
    
    protected function by($username)
    {
        $userid = User::where('name',$username)->get();
        return $this->builder->where('user_id',$userid[0]->id);
    }
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }
}