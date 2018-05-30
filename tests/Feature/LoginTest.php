<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Foundation\Testing\CrawlerTrait;
use Illuminate\Support\Facades\Storage;


class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testHome()
    {
      $user = factory(User::class)->create();

      $this->actingAs($user)->get('/home')->assertStatus(200);
      echo PHP_EOL . 'testhome';
    }
    public function testFalseLogin(){
      $response = $this->call('POST', '/login', [
        'email' => 'badUsername@gmail.com',
        'password' => 'badPass',
        '_token' => csrf_token()
      ])->assertStatus(302);
    }
}
