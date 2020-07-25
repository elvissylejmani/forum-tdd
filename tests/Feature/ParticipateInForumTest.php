<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ParticipateInForum extends TestCase
{
    use WithFaker, RefreshDatabase;
    /** @test */
    // public function an_authenticated_user_may_participate_in_forum_threads()
    // {

    //     $this->be($user = factory('App\User')->create());

    //     $thread = factory('App\Thread')->create();
        
    //     $reply = factory('App\Reply')->create();

    //     $this->post('/threads/'. $thread->id .'/replies',$reply->toArray());

    //     $this->get($thread->path())
    //     ->assertSee($reply->body);
    // }
}
