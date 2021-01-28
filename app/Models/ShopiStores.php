<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopiStores extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * 
     * @var array
     */
    protected $fillable = [
        'shopistore_name',
        'date_created'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'date_created' => 'string',
    ];
}