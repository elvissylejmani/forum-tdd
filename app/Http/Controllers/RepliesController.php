<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Reply;
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
        $this->validate(request(),[
            'body' => 'required' 
        ]);
        $thread->addReply([
            'user_id' => Auth::id(),
            'body' => request('body')
        ]);
        return back()->with('flash','Your replie has been left.');
    }
    public function destroy(Reply $reply)
    {
        $this->authorize('update',$reply);

        // if($reply->user_id != auth()->id())
        // {
        //     return response([],403);
        // }
        

        $reply->delete();
        
        return back();
    }
}
