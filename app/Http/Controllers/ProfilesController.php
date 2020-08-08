<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function show(User $ProfileUser)
    {
        $activities = $ProfileUser->activity()->latest()->with('subject')->get();
        return view('profiles.show',[
            'ProfileUser' => $ProfileUser,
            'activities' => $activities
        ]);
    }
}
