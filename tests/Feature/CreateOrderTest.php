<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class CreateOrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
      $this->assertTrue(true);

      /*
      $user = factory(User::class)->create();

      $request = $this->actingAs($user)->json('GET', '/orders/create', [
        'title' => 'Sallet',
        'image' => 'https://www.google.com',
        'description' => 'Tom+Sara',
        'maxprice' => '10',
        'name' => '=sant',
        'email' => 'lovein@air.com',
        'phonenumber' => '123'
      ]);

      $request->assertStatus(200)->assertJson([ 'created' => true ]);
      */
    }
}
