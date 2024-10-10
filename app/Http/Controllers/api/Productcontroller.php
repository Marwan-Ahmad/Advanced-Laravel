<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;
use App\Request\products\createproductvladation;
use App\Request\products\updateproductvladation;
use App\services\productservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Productcontroller extends Basecontroller
{
    public $productservice;

    public function __construct(productservice $productservice)
    {
        $this->productservice=$productservice;
    }

    public function index(){

        $this->authorize("viewAny", Product::class);
        return $this->productservice->getproducts();
    }


    public function store(createproductvladation $validation){
        if(!empty($validation->getErrors())){
            return $this->sendresponse([],$validation->getErrors(),406);
        }
        $this->authorize("create", Product::class);
        $data=$validation->request()->all();

        $data['user_id']=Auth::user()->id;

        $response=$this->productservice->createproduct($data);
        return $this->sendresponse($response,'the product added successfuly');
    }

    public function update($id,updateproductvladation $updatevalidation){
        if(!empty($updatevalidation->getErrors())){
            return $this->sendresponse([],$updatevalidation->getErrors(),406);
        }


        $l= $this->authorize("update1",[User::class,Product::class]);

        $data=$updatevalidation->request()->all();

        $data['user_id']=Auth::user()->id;

        $response=$this->productservice->updateproduct($id,$data);
        return $this->sendresponse($response,'the product added successfuly');
    }


    public function destroy($id){

        $products=Product::query()->where('id',$id)->first();

      $this->authorize('delete:[User::class]',$products);
      $product=$this->productservice->deleteproduct($id);
        return $this->sendresponse($product,'product deleted successfuly');
    }


    // public function export(){

    // }

    // public function import(){

    // }
}