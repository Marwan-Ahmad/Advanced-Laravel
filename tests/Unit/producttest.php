<?php

namespace Tests\Unit;

use App\services\productservice;
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

    // public function test_product_create_database()
    // {
    //   $this->productService->createproduct($this->product);

    //     $this->assertDatabaseHas('products',[
    //         'title'=>'test product'
    //     ]);
    // }

    public function test_delete_product(){
        $this->productService->deleteProduct(1);

        $this->assertDatabaseMissing('products',[
            'id'=> 1,
        ]);
    }
}
