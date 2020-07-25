<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CreateThreadsTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /** @test */
    public function guests_may_not_create_threads()
    {
        // $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = create('App\Thread');

        $this->post('/threads',$thread->toArray());
    }



    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        $this->signIn();
        
        $thread = factory('App\Thread')->create();

        $this->post('/threads',$thread->toArray());

        $this->get($thread->path())
        ->assertSee($thread->title)
       ->assertSee($thread->body);
    }
}
