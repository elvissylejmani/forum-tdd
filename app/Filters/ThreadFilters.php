<?php

namespace App\Filters;


use App\User;

class  ThreadFilters extends Filters{ 

    protected $fillters = ['by'];
    
    public function by($username)
    {
        $userid = User::where('name',$username)->get();
        return $this->builder->where('user_id',$userid[0]->id);
    }
}