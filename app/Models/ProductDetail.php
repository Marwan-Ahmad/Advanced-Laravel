<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'size',
        'color',
        'price',
        'product_id',
    ];



    public function product(){
        return $this->belongsTo('App\Models\Product','product_id','id');

    }

}