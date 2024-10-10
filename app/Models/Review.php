<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable=[
        'comment',
        'user_id',
        'product_id',
    ];

    public function image(){
        return $this->morphOne('App\Models\image','imagable');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function product(){
        return $this->belongsTo(product::class,'product_id');
    }
}