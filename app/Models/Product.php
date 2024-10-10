<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'user_id',
    ];

    public function productdetails(){
        return $this->hasOne(ProductDetail::class,'product_id','id');
    }

    public function review(){
        return $this->hasMany(Review::class,'product_id');
    }

    public function image(){
        return $this->morphOne('App\Models\image','imagable');
    }

    public function user(){
        return $this->hasMany(User::class,'user_id');
    }
}