<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Transformers\CategoryTransformer;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{

    use HasFactory ;

    protected $data = ['deleted_at'];


    protected $fillable = [
    	'name',
    	'description',
    ];
    protected $hidden = [
        'pivot'
    ];

    public function products()
    {
    	return $this->belongsToMany(Product::class);
    }
}
