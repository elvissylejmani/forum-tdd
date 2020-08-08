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
            'activities' => $this->getActivity($ProfileUser)
        ]);
    }
    protected function getActivity($user)
    {
        return $user->activity()->latest()->take(50)->with('subject')->take(50)->get()->groupBy(function ($activity) {
            return $activity->created_at->format('Y-m-d');
        });
    }
}
