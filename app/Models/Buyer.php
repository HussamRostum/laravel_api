<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\BuyerScope;
use App\Transformers\BuyerTransformer;

class Buyer extends User
{


    public function transactions()
    {
    	return $this->hasMany(Transaction::class);
    }

    protected static function boot()
    {
        parent::boot();
        static::addGlobalScope(new BuyerScope);
    }
}
