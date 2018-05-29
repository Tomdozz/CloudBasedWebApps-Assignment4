<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();

        $response = $this->actingAs($user)         // Model to act as tester
                 ->withSession(['foo' => 'bar'])  // load session with data here
                 ->get('/editProduct');          // the view to test


        
    }
}
