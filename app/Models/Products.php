<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'sku',
        'cost',
        'price',
        'dprice',
        'qty',
        'image',
        'description',
        'brand_id',
        'category_id',
        'store_id',
        'availability',
        'quantity',
        'quantity1',
        'quantity2',
        'quantity3',
        'company_id'
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'cost' => 'int',
    ];
}