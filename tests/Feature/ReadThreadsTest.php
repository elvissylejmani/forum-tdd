<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadsTest extends TestCase
{
    use RefreshDatabase;


    /** @test */
    public function a_user_can_browse_threads()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads');

        $response->assertSee($thread->title);

      
    }
    /** @test */
    public function a_user_can_read_single_thread()
    {
        $thread = factory('App\Thread')->create();

        $response = $this->get('/threads/' . $thread->id);

        $response->assertSee($thread->title);

    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $thread = factory('App\Thread')->create();

      $reply = factory('App\Reply')
      ->create(['thread_id' => $thread->id]);
     
        $this->get('/threads/' . $thread->id)
        ->assertSee($reply->body);

    }
}
