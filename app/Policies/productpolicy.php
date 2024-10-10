<?php

namespace App\Policies;

// use App\Models\Product;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;

class productpolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        $haspermission=$user->permissions()->where('title','show-product')->first();
        return $haspermission?true:false;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Product $product): bool
    {

    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
            $haspermission=$user->permissions()->where('title','create-product')->first();
            return $haspermission?true:false;

    }

    /**
     * Determine whether the user can update the model.
     */
    public function update1(Product $product): bool
    {
        $user=User::query()->where('id',$product->user_id)->first();
        $haspermission=$user->permissions()->where('title','update-product')->first();

        if($user?->id===$product->user_id && $haspermission){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Product $product): bool
    {
        $haspermission=$user->permissions()->where('title','delete-product')->first();

        if($user?->id===$product->user_id&&$haspermission){
            return true;
        }
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Product $product): bool
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Product $product): bool
    {
        //
    }
}