<?php

namespace Tests\Feature;

use App\Models\User;
use App\services\productservice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class producttest extends TestCase
{
    protected productservice $productService;

    protected $product;
    protected function setUp(): void
    {
        parent::setUp();
        $this->productService = $this->app->make('App\services\productservice');
        $this->product = [
            'title'=>'test product',
            'description'=>'this is the first product product',
            'user_id'=>1,
            'size'=>30,
            'color'=>'red',
        ];
    }
    public function test_create_product_without_data(): void
    {
        $response = $this->get('/api/products');

        $response->assertStatus(500);
    }
    public function test_create_product_without_auth(): void
    {
        $response = $this->withHeaders(['Accept'=>'application/json'])->post('/api/products',$this->product);

        $response->assertStatus(401);
    }
    public function test_create_product_with_auth_without_data(): void
    {
        $user=User::first();
        $response = $this->withHeaders(['Accept'=>'application/json'])->actingAs($user)->post('/api/products');

        $response->assertStatus(406);
    }
    public function test_create_product_auth(): void
    {
        $user=User::first();
        $response = $this->withHeaders(['Accept'=>'application/json'])->actingAs($user)->post('/api/products', $this->product);

        $response->assertStatus(200);
    }
}
