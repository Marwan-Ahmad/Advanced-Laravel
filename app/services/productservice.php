<?php
namespace App\services;

use App\Events\newproductevent;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Support\Facades\Event;

class productservice
{
    public function getproducts(){
        return Product::all();
    }

    public function getproduct($id){
        return Product::query()->where('id',$id)->first();
    }

    // public function createproduct($data){
    //     $data['user_id']=auth()->user()->id;

    //    $id = Product::query()->create($data);
    //    $data['product_id']=$id->id;
    //    ProductDetail::query()->create($data);

    //    return $id;
    // }

    public function createproduct($data){
        $data['user_id']=auth()->user()->id;

       $id = Product::query()->create($data);

       $id->productdetails()->create($data);

    //    Event::dispatch(new newproductevent(auth()->user(),$id));

       return $id;
    }



    public function updateproduct($id,$data){

        $product=$this->getproduct($id);

        $product->title=$data['title'];

        $product->description=$data['description'];

        $product->user_id=$data['user_id'];

        $product->productdetails->size=$data['size'];
        $product->productdetails->color=$data['color'];
        $product->productdetails->price=$data['price'];
        $product->save();
        return $product;
    }

    public function deleteproduct($id){
        $deleteproduct=$this->getproduct($id);
        $deleteproduct->delete();
    }
}
