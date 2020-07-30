<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{

    
    public function store(Reply $reply)
    {
    return DB::table('favorites')->insert([
            'user_id' => auth()->user()->id,
            'favorite_id' => $reply->id,
            'favorite_type' => get_class($reply)
        ]);
    }
}
