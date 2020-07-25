<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Thread;
use Illuminate\Support\Facades\Auth;

class RepliesController extends Controller
{
    public function __construct()
    {
            $this->middleware('auth');
    }

    public function store($channelId,Thread $thread)
    {
        $thread->addReply([
            'user_id' => Auth::id(),
            'body' => request('body')
        ]);
        return back();
    }
}
