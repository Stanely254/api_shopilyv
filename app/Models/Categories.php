<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable
     * @var array
     */
    protected $fillable = [
        'name',
        'active',
    ];

    /**
     * The attributes that should cast to native types
     */
    protected $casts = [
        'active' => 'int'
    ];
}