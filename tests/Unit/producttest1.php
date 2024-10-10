<?php

namespace Tests\Unit;

use App\services\productservice;
use PHPUnit\Framework\TestCase;
use Tests\TestCase as TestsTestCase;

class producttest1 extends TestsTestCase
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

    public function test_product_create_database()
    {
       $this->productService->createproduct($this->product);

        $this->assertDatabaseHas('products',[
            'title'=>'test product'
        ]);
    }
}