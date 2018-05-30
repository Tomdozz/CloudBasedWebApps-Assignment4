<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Illuminate\Foundation\Testing\CrawlerTrait;
use Illuminate\Support\Facades\Storage;
use App\Product;

class AuthFormTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProduct()
    {
        $user = factory(User::class)->create();
         $input = [
          'title' => 'Sallet',
          'image' => 'https://www.google.com',
          'description' => 'Testdata',
          'price' => 1234];
        $this->actingAs($user)->postJson(route('products.store'), $input)->assertStatus(201);
        $input = [
         'title' => 'Sallet',
         'image' => 'https://www.google.com',
         'description' => 'Testdata'];
       $this->actingAs($user)->postJson(route('products.store'), $input)->assertStatus(500);
    }
    public function testOrderUpdate()
    {
      $user = factory(User::class)->create();
      $input = [
       'title' => 'Sallet',
       'image' => 'https://www.google.com',
       'description' => 'Testdata',
       'name' => 'Sara',
       'email' => 'tom@sara.com',
       'phonenumber' => 123
       ];
     $response = $this->actingAs($user)->putJson(route('orders.update', ['id' => 1]), $input);
     $this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404 || $response->getStatusCode() === 500);

     //$response = $this->actingAs($user)->call('DELETE', 'orders/1');
     //$this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404 || $response->getStatusCode() === 500);
    }
    public function testProductUpdate()
    {
      $user = factory(User::class)->create();
      $input = [
       'title' => 'Sallet',
       'image' => 'https://www.google.com',
       'description' => 'Testdata',
       'price' => 1234];
     $response = $this->actingAs($user)->putJson(route('products.update', ['id' => 1]), $input);
     $this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404);
     $input = [
      'title' => 'Sallet',
      'image' => 'https://www.google.com',
      'description' => 'Testdata',
      'price' => 1234];
    $response = $this->actingAs($user)->putJson(route('products.update', ['id' => 999999]), $input);
    $this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404);
    $input = [];
    $this->actingAs($user)->putJson(route('products.update', ['id' => 1]), $input);
    $this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404);
    }
    public function testDestroy()
    {
      $user = factory(User::class)->create();
      $response = $this->actingAs($user)->call('DELETE', 'products/999999');
      $this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404);
      $response = $this->actingAs($user)->call('DELETE', 'products/2');
      $this->assertTrue($response->getStatusCode() === 200 || $response->getStatusCode() === 404);
    }
}
