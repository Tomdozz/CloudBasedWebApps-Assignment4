<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RouteTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
    public function testRoutes()
    {
      $appURL = env('APP_URL');

      $urls = [
          '/',
          '/products',
          '/orders',
          '/products/1',
          '/orders/create',
          '/login',
          '/register'
        ];

        echo  PHP_EOL;

        foreach ($urls as $url) {
          $response = $this->get($url);
          if((int)$response->status() !== 200){
              echo  $appURL . $url . ' (FAILED) did not return a 200. ' . (int)$response->status();
              $this->assertTrue(false);
            } else {
              echo $appURL . $url . ' (success ?)';
              $this->assertTrue(true);
            }
          echo  PHP_EOL;
        }
      }
}
