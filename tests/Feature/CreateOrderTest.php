<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Foundation\Testing\CrawlerTrait;
use Illuminate\Support\Facades\Storage;

class CreateOrderTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
      Storage::fake('public');
      $user = factory(User::class)->create();
      //$this->assertTrue(true);
       $input = [
        'title' => 'Sallet',
        'image' => 'https://www.google.com',
        'description' => 'Testdata',
        'name' => '=testName',
        'email' => 'test@air.com',
        'price' => 1234,
        'phonenumber' => 123];
        //$this->actingAs($user)
        $this->postJson(route('orders.store'), $input)->assertStatus(201);
    }
    public function testFalseData(){
      Storage::fake('public');
      $user = factory(User::class)->create();
      //$this->assertTrue(true);
       $input = [
        'title' => 'Sallet',
        'image' => 'https://www.google.com',
        'description' => 'Testdata',
        'name' => '=testName',
        'email' => 'test@air.com',
        'phonenumber' => 123];
        //$this->actingAs($user)
        $this->postJson(route('orders.store'), $input)->assertStatus(500);
    }
}
