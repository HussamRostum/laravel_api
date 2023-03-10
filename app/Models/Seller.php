<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\SellerScope;
use App\Transformers\SellerTransformer;

class Seller extends User
{

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new SellerScope);
    }

    public function products()
    {
    	return $this->hasMany(Product::class);
    }
}
