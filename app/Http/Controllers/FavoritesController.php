<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use App\Favorite;
class FavoritesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function store(Reply $reply)
    {
         $reply->favorite();
        
        return back();
    
    
    
    
        // Favorite::create([
    //         'user_id' => auth()->user()->id,
    //         'favorited_id' => $reply->id,
    //         'favorite_type' => get_class($reply)
    //     ]);
    
    }
}
