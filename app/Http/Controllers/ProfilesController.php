<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $ProfileUser)
    {
     
        return view('profiles.show', [
            'ProfileUser' => $ProfileUser,
            'activities' => \App\Activity::feed($ProfileUser)
        ]);
    }
}
