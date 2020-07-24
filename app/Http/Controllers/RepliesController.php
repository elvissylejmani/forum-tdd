<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Thread;

class RepliesController extends Controller
{
    //

    public function store(Thread $thread)
    {
        $thread->addReply(request([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]));
    }
}
